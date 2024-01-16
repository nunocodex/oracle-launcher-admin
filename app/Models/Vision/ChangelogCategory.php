<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\ChangelogCategory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ChangelogCategory defaultSort(string $column, string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|ChangelogCategory filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ChangelogCategory filtersApply(iterable $filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ChangelogCategory filtersApplySelection($class)
 * @method static \Illuminate\Database\Eloquent\Builder|ChangelogCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChangelogCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChangelogCategory query()
 * @property int $id
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|ChangelogCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChangelogCategory whereTitle($value)
 * @mixin \Eloquent
 */
class ChangelogCategory extends VisionModel
{
    use AsSource, Filterable, Attachable;
    
    protected $fillable = [
        'title',
    ];
}
