<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\Shop
 *
 * @property-read Reward|null $reward
 * @method static Builder|Shop newModelQuery()
 * @method static Builder|Shop newQuery()
 * @method static Builder|Shop query()
 * @property int $id
 * @property string $category
 * @property int $reward_id
 * @property int $dp_or_bpc_price
 * @property int $vp_price
 * @method static Builder|Shop whereCategory($value)
 * @method static Builder|Shop whereDpOrBpcPrice($value)
 * @method static Builder|Shop whereId($value)
 * @method static Builder|Shop whereRewardId($value)
 * @method static Builder|Shop whereVpPrice($value)
 * @method static Builder|Shop defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|Shop filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static Builder|Shop filtersApply(iterable $filters = [])
 * @method static Builder|Shop filtersApplySelection($class)
 * @mixin Eloquent
 */
class Shop extends VisionModel
{
    use AsSource, Filterable;

    protected $table = 'shop';

    protected $fillable = [
        'category',
        'reward_id',
        'dp_or_bpc_price',
        'vp_price',
    ];

    public function reward(): BelongsTo
    {
        return $this->belongsTo(Reward::class);
    }
}
