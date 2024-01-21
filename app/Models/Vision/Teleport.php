<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Teleport extends VisionModel
{
    use AsSource, Filterable;

    protected $table = 'teleport_list';

    protected $casts = [
        'alliance_allowed' => 'boolean',
        'horde_allowed' => 'boolean'
    ];
}
