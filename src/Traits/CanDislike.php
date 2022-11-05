<?php


namespace HeiHeiHallo\Acquaintances\Traits;

use Illuminate\Support\Facades\Event;
use HeiHeiHallo\Acquaintances\Interaction;

/**
 * Trait CanDislike.
 */
trait CanDislike
{
    /**
     * Dislike an item or items.
     *
     * @param  int|array|\Illuminate\Database\Eloquent\Model  $targets
     * @param  string  $class
     *
     * @return array
     *
     * @throws \Exception
     */
    public function dislike($targets, $class = __CLASS__)
    {
        Event::dispatch('acq.dislikes.dislike', [$this, $targets]);

        return Interaction::attachRelations($this, 'dislikes', $targets, $class);
    }

    /**
     * Undislike an item or items.
     *
     * @param  int|array|\Illuminate\Database\Eloquent\Model  $targets
     * @param  string  $class
     *
     * @return array
     */
    public function undislike($targets, $class = __CLASS__)
    {
        Event::dispatch('acq.dislikes.undislike', [$this, $targets]);

        return Interaction::detachRelations($this, 'dislikes', $targets, $class);
    }

    /**
     * Toggle dislike an item or items.
     *
     * @param  int|array|\Illuminate\Database\Eloquent\Model  $targets
     * @param  string  $class
     *
     * @return array
     *
     * @throws \Exception
     */
    public function toggleDislike($targets, $class = __CLASS__)
    {
        return Interaction::toggleRelations($this, 'dislikes', $targets, $class);
    }

    /**
     * Check if a model is disliked by a given model.
     *
     * @param  int|array|\Illuminate\Database\Eloquent\Model  $target
     * @param  string  $class
     *
     * @return bool
     */
    public function hasDisliked($target, $class = __CLASS__)
    {
        return Interaction::isRelationExists($this, 'dislikes', $target, $class);
    }

    /**
     * Return item dislikes.
     *
     * @param  string  $class
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dislikes($class = __CLASS__)
    {
        return $this->morphedByMany($class, 'subject',
            config('acquaintances.tables.interactions'))
                    ->wherePivot('relation', '=', Interaction::RELATION_DISLIKE)
                    ->withPivot(...Interaction::$pivotColumns)
                    ->using(Interaction::getInteractionRelationModelName())
                    ->withTimestamps();
    }
}
