<?php


namespace HeiHeiHallo\Acquaintances\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FriendFriendshipGroups
 * @package HeiHeiHallo\Acquaintances\Models
 */
class FriendFriendshipGroups extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['friendship_id', 'group_id', 'friend_id', 'friend_type'];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @param  array  $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->table = config('acquaintances.tables.friendship_groups');

        parent::__construct($attributes);
    }

}
