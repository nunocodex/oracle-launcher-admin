<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filterable;
use Orchid\Filters\HttpFilter;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\Slider
 *
 * @property int $id
 * @property string $image_url
 * @method static Builder|Slider defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|Slider filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|Slider filtersApply(iterable $filters = [])
 * @method static Builder|Slider filtersApplySelection($class)
 * @method static Builder|Slider newModelQuery()
 * @method static Builder|Slider newQuery()
 * @method static Builder|Slider query()
 * @method static Builder|Slider whereId($value)
 * @method static Builder|Slider whereImageUrl($value)
 * @property-read string $image_thumbnail
 * @mixin Eloquent
 */
class Slider extends VisionModel
{
    use AsSource, Filterable;

    protected $table = 'slider';

    public function getImageThumbnailAttribute(): string
    {
        return '<img src="' . $this->image_url . '" style="width:40px; height:40px;">';
    }
}
