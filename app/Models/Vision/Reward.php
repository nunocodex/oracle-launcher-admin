<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\HttpFilter;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\Reward
 *
 * @method static Builder|Reward defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|Reward filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|Reward filtersApply(iterable $filters = [])
 * @method static Builder|Reward filtersApplySelection($class)
 * @method static Builder|Reward newModelQuery()
 * @method static Builder|Reward newQuery()
 * @method static Builder|Reward query()
 * @property int $id
 * @property string $title
 * @property string $picture_url
 * @property string $description
 * @property string|null $soap_command available fields: {ACCOUNT_NAME}, {ACCOUNT_ID}, {PLAYER_NAME}, {PLAYER_GUID}, {INPUT}
 * @property int $requires_player
 * @property int $requires_input
 * @method static Builder|Reward whereDescription($value)
 * @method static Builder|Reward whereId($value)
 * @method static Builder|Reward wherePictureUrl($value)
 * @method static Builder|Reward whereRequiresInput($value)
 * @method static Builder|Reward whereRequiresPlayer($value)
 * @method static Builder|Reward whereSoapCommand($value)
 * @method static Builder|Reward whereTitle($value)
 * @mixin Eloquent
 */
class Reward extends VisionModel
{
    use AsSource, Filterable, Attachable;

    protected $fillable = [
        'title',
        'picture_url',
        'description',
        'soap_command',
        'requires_player',
        'requires_input',
    ];

    public function getPictureThumbnailAttribute(): string
    {
        return '<img src="' . $this->picture_url . '" style="width:40px; height:40px;">';
    }
}
