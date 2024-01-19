<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\HttpFilter;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\Event
 *
 * @method static Builder|Event defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|Event filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|Event filtersApply(iterable $filters = [])
 * @method static Builder|Event filtersApplySelection($class)
 * @method static Builder|Event newModelQuery()
 * @method static Builder|Event newQuery()
 * @method static Builder|Event query()
 * @property int $id
 * @property string $picture_url
 * @property string $redirect_url
 * @property string $title
 * @property string $content
 * @property Carbon $expiry_date
 * @method static Builder|Event whereContent($value)
 * @method static Builder|Event whereExpiryDate($value)
 * @method static Builder|Event whereId($value)
 * @method static Builder|Event wherePictureUrl($value)
 * @method static Builder|Event whereRedirectUrl($value)
 * @method static Builder|Event whereTitle($value)
 * @mixin Eloquent
 */
class Event extends VisionModel
{
    use AsSource, Filterable, Attachable;

    protected $fillable = [
        'picture_url',
        'redirect_url',
        'title',
        'content',
        'expiry_date'
    ];

    protected $casts = [
        'expiry_date' => 'datetime'
    ];

    public function getPictureThumbnailAttribute(): string
    {
        return '<img src="' . $this->picture_url . '" style="width:40px; height:40px;">';
    }
}
