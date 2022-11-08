<?php

namespace HeiHeiHallo\Acquaintances\Traits;

use App\Traits\CanBeDisliked;
use HeiHeiHallo\Acquaintances\Traits\CanBeFavorited;
use HeiHeiHallo\Acquaintances\Traits\CanBeLiked;
use HeiHeiHallo\Acquaintances\Traits\CanBeRated;
use HeiHeiHallo\Acquaintances\Traits\CanBeVoted;

/**
 * Trait UuidModel
 * @package App\Traits
 */
trait CanBe
{
    use CanBeLiked, CanBeDisliked, CanBeFavorited, CanBeVoted;
}