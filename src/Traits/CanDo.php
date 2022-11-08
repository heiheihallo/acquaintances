<?php

namespace HeiHeiHallo\Acquaintances\Traits;

use HeiHeiHallo\Acquaintances\Traits\CanFavorite;
use HeiHeiHallo\Acquaintances\Traits\CanFollow;
use HeiHeiHallo\Acquaintances\Traits\CanLike;
use HeiHeiHallo\Acquaintances\Traits\CanSubscribe;
use HeiHeiHallo\Acquaintances\Traits\CanVote;

/**
 * Trait UuidModel
 * @package App\Traits
 */
trait CanDo
{
    use CanFollow, CanLike, CanFavorite, CanSubscribe, CanVote;
}