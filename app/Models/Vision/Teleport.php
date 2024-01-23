<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\Teleport
 *
 * @property int $id
 * @property string $name
 * @property int $map
 * @property float $dest_x
 * @property float $dest_y
 * @property float $dest_z
 * @property float $orientation
 * @property int $dp_or_bpc_price
 * @property int $vp_price
 * @property bool $alliance_allowed
 * @property bool $horde_allowed
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport defaultSort(string $column, string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport filtersApply(iterable $filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport filtersApplySelection($class)
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport query()
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport whereAllianceAllowed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport whereDestX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport whereDestY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport whereDestZ($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport whereDpOrBpcPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport whereHordeAllowed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport whereMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport whereOrientation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teleport whereVpPrice($value)
 * @mixin \Eloquent
 */
class Teleport extends VisionModel
{
    use AsSource, Filterable;

    protected $table = 'teleport_list';

    protected $casts = [
        'alliance_allowed' => 'boolean',
        'horde_allowed' => 'boolean'
    ];
}
