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
 * App\Models\Vision\GiftCode
 *
 * @property-read Reward|null $reward
 * @method static Builder|GiftCode defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|GiftCode filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|GiftCode filtersApply(iterable $filters = [])
 * @method static Builder|GiftCode filtersApplySelection($class)
 * @method static Builder|GiftCode newModelQuery()
 * @method static Builder|GiftCode newQuery()
 * @method static Builder|GiftCode query()
 * @property int $id
 * @property string $code
 * @property int $reward_id
 * @property int $redeems_allowed
 * @property Carbon $valid_until
 * @method static Builder|GiftCode whereCode($value)
 * @method static Builder|GiftCode whereId($value)
 * @method static Builder|GiftCode whereRedeemsAllowed($value)
 * @method static Builder|GiftCode whereRewardId($value)
 * @method static Builder|GiftCode whereValidUntil($value)
 * @mixin Eloquent
 */
class GiftCode extends VisionModel
{
    use AsSource, Filterable, Attachable;

    protected $table = 'gift_codes';

    protected $fillable = [
        'code',
        'reward_id',
        'redeems_allowed',
        'valid_until',
    ];

    protected $casts = [
        'valid_until' => 'datetime',
    ];

    public function reward(): BelongsTo
    {
        return $this->belongsTo(Reward::class);
    }
}
