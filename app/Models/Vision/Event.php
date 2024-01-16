<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\Event
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Event defaultSort(string $column, string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Event filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Event filtersApply(iterable $filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Event filtersApplySelection($class)
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @property int $id
 * @property string $picture_url
 * @property string $redirect_url
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon $expiry_date
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePictureUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereRedirectUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitle($value)
 * @mixin \Eloquent
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
}
