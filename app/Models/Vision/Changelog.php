<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\Changelog
 *
 * @property-read \App\Models\Vision\ChangelogCategory|null $cat
 * @method static \Illuminate\Database\Eloquent\Builder|Changelog defaultSort(string $column, string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Changelog filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Changelog filtersApply(iterable $filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Changelog filtersApplySelection($class)
 * @method static \Illuminate\Database\Eloquent\Builder|Changelog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Changelog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Changelog query()
 * @property int $id
 * @property int $category
 * @property string $icon_url
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon $date
 * @method static \Illuminate\Database\Eloquent\Builder|Changelog whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Changelog whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Changelog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Changelog whereIconUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Changelog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Changelog whereTitle($value)
 * @mixin \Eloquent
 */
class Changelog extends VisionModel
{
    use AsSource, Filterable, Attachable;
    
    protected $table = 'changelog';

    protected $fillable = [
        'category',
        'icon_url',
        'title',
        'description',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function cat(): BelongsTo
    {
        return $this->belongsTo(ChangelogCategory::class, 'category', 'id');
    }
}
