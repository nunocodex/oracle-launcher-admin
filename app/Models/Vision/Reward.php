<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\Reward
 *
 * @property-read Attachment|null $picture
 * @method static \Illuminate\Database\Eloquent\Builder|Reward defaultSort(string $column, string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Reward filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward filtersApply(iterable $filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Reward filtersApplySelection($class)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reward query()
 * @property int $id
 * @property string $title
 * @property string $picture_url
 * @property string $description
 * @property string|null $soap_command available fields: {ACCOUNT_NAME}, {ACCOUNT_ID}, {PLAYER_NAME}, {PLAYER_GUID}, {INPUT}
 * @property int $requires_player
 * @property int $requires_input
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward wherePictureUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereRequiresInput($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereRequiresPlayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereSoapCommand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reward whereTitle($value)
 * @mixin \Eloquent
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

    public function picture(): HasOne
    {
        return $this->hasOne(Attachment::class, 'id', 'picture_url');
    }
}
