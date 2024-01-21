<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filterable;
use Orchid\Filters\HttpFilter;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\Faq
 *
 * @method static Builder|Faq defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|Faq filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|Faq filtersApply(iterable $filters = [])
 * @method static Builder|Faq filtersApplySelection($class)
 * @method static Builder|Faq newModelQuery()
 * @method static Builder|Faq newQuery()
 * @method static Builder|Faq query()
 * @property int $id
 * @property string $title
 * @property string $text
 * @method static Builder|Faq whereId($value)
 * @method static Builder|Faq whereText($value)
 * @method static Builder|Faq whereTitle($value)
 * @mixin Eloquent
 */
class Faq extends VisionModel
{
    use AsSource, Filterable;
    
    protected $table = 'faq';

    protected $fillable = [
        'title',
        'text'
    ];
}
