<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\Article
 *
 * @property-read AccountData|null $author
 * @property-read ArticlePosition|null $location
 * @method static Builder|Article defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|Article filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static Builder|Article filtersApply(iterable $filters = [])
 * @method static Builder|Article filtersApplySelection($class)
 * @method static Builder|Article newModelQuery()
 * @method static Builder|Article newQuery()
 * @method static Builder|Article query()
 * @property int $id
 * @property int $author_id
 * @property string|null $picture_url
 * @property string|null $redirect_url
 * @property string $title
 * @property string $content
 * @property int $position
 * @property Carbon $date
 * @method static Builder|Article whereAuthorId($value)
 * @method static Builder|Article whereContent($value)
 * @method static Builder|Article whereDate($value)
 * @method static Builder|Article whereId($value)
 * @method static Builder|Article wherePictureUrl($value)
 * @method static Builder|Article wherePosition($value)
 * @method static Builder|Article whereRedirectUrl($value)
 * @method static Builder|Article whereTitle($value)
 * @mixin Eloquent
 */
class Article extends VisionModel
{
    use AsSource, Filterable, Attachable;

    protected $fillable = [
        'author_id',
        'picture_url',
        'redirect_url',
        'title',
        'content',
        'position',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(AccountData::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(ArticlePosition::class, 'position', 'id');
    }

    public function getPictureThumbnailAttribute(): string
    {
        return '<img src="' . $this->picture_url . '" style="width:40px; height:40px;">';
    }
}
