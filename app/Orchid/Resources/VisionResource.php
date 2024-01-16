<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;

abstract class VisionResource extends Resource
{
    public static function displayInNavigation(): bool
    {
        return false;
    }
}
