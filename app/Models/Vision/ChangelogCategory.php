<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filterable;
use Orchid\Filters\HttpFilter;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\ChangelogCategory
 *
 * @method static Builder|ChangelogCategory defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|ChangelogCategory filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|ChangelogCategory filtersApply(iterable $filters = [])
 * @method static Builder|ChangelogCategory filtersApplySelection($class)
 * @method static Builder|ChangelogCategory newModelQuery()
 * @method static Builder|ChangelogCategory newQuery()
 * @method static Builder|ChangelogCategory query()
 * @property int $id
 * @property string $title
 * @method static Builder|ChangelogCategory whereId($value)
 * @method static Builder|ChangelogCategory whereTitle($value)
 * @mixin Eloquent
 */
class ChangelogCategory extends VisionModel
{
    use AsSource, Filterable;
    
    protected $fillable = [
        'title',
    ];
}
