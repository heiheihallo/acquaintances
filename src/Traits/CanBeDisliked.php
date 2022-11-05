<?php


namespace HeiHeiHallo\Acquaintances\Traits;

use HeiHeiHallo\Acquaintances\Interaction;

/**
 * Trait CanBeDisliked.
 */
trait CanBeDisliked
{
    /**
     * Check if a model is is disliked by by given model.
     *
     * @param  int|array|\Illuminate\Database\Eloquent\Model  $user
     *
     * @return bool
     */
    public function isDislikedBy($user)
    {
        return Interaction::isRelationExists($this, 'dislikers', $user);
    }

    /**
     * Return followers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dislikers()
    {
        return $this->morphToMany(Interaction::getUserModelName(), 'subject',
            config('acquaintances.tables.interactions'))
                    ->wherePivot('relation', '=', Interaction::RELATION_DISLIKE)
                    ->withPivot(...Interaction::$pivotColumns)
                    ->using(Interaction::getInteractionRelationModelName())
                    ->withTimestamps();
    }

    /**
     * Alias of dislikers.
     *
     * @return mixed
     */
    public function haters()
    {
        return $this->dislikers();
    }

    public function dislikersCount()
    {
        return $this->dislikers()->count();
    }

    public function getDislikersCountAttribute()
    {
        return $this->dislikersCount();
    }

    public function dislikersCountFormatted($precision = 1, $divisors = null)
    {
        return Interaction::numberToReadable($this->dislikersCount(), $precision, $divisors);
    }

    /**
     * Alias of dislikersCountFormatted.
     *
     * @param  int  $precision
     * @param  null  $divisors
     *
     * @return string
     */
    public function dislikersCountReadable($precision = 1, $divisors = null)
    {
        return $this->dislikersCountFormatted($precision, $divisors);
    }

    public function getDislikersCountReadableAttribute()
    {
        return $this->dislikersCount();
    }
}
