<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filterable;
use Orchid\Filters\HttpFilter;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\ArticlePosition
 *
 * @method static Builder|ArticlePosition defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|ArticlePosition filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|ArticlePosition filtersApply(iterable $filters = [])
 * @method static Builder|ArticlePosition filtersApplySelection($class)
 * @method static Builder|ArticlePosition newModelQuery()
 * @method static Builder|ArticlePosition newQuery()
 * @method static Builder|ArticlePosition query()
 * @property int $id position id
 * @property string $name position name
 * @method static Builder|ArticlePosition whereId($value)
 * @method static Builder|ArticlePosition whereName($value)
 * @mixin Eloquent
 */
class ArticlePosition extends VisionModel
{
    use AsSource, Filterable;
    
    protected $fillable = [
        'name',
    ];
}
