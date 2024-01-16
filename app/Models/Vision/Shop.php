<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Vision\Shop
 *
 * @property-read \App\Models\Vision\Reward|null $reward
 * @method static \Illuminate\Database\Eloquent\Builder|Shop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop query()
 * @property int $id
 * @property string $category
 * @property int $reward_id
 * @property int $dp_or_bpc_price
 * @property int $vp_price
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereDpOrBpcPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereRewardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereVpPrice($value)
 * @mixin \Eloquent
 */
class Shop extends VisionModel
{
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
