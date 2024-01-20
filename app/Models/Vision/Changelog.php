<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\HttpFilter;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\Changelog
 *
 * @property-read ChangelogCategory|null $cat
 * @method static Builder|Changelog defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|Changelog filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|Changelog filtersApply(iterable $filters = [])
 * @method static Builder|Changelog filtersApplySelection($class)
 * @method static Builder|Changelog newModelQuery()
 * @method static Builder|Changelog newQuery()
 * @method static Builder|Changelog query()
 * @property int $id
 * @property int $category
 * @property string $icon_url
 * @property string $title
 * @property string $description
 * @property Carbon $date
 * @method static Builder|Changelog whereCategory($value)
 * @method static Builder|Changelog whereDate($value)
 * @method static Builder|Changelog whereDescription($value)
 * @method static Builder|Changelog whereIconUrl($value)
 * @method static Builder|Changelog whereId($value)
 * @method static Builder|Changelog whereTitle($value)
 * @property-read string $icon_thumbnail
 * @mixin Eloquent
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

    public function getIconThumbnailAttribute(): string
    {
        return '<img src="' . $this->icon_url . '" style="width:40px; height:40px;">';
    }
}
