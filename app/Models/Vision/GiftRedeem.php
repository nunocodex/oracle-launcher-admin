<?php

namespace App\Models\Vision;

use App\Models\VisionReadOnlyModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Filters\HttpFilter;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\GiftRedeem
 *
 * @property int $user_id
 * @property int $gift_id
 * @property-read AccountData|null $account
 * @property-read GiftCode|null $gift
 * @method static Builder|GiftRedeem defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|GiftRedeem filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|GiftRedeem filtersApply(iterable $filters = [])
 * @method static Builder|GiftRedeem filtersApplySelection($class)
 * @method static Builder|GiftRedeem newModelQuery()
 * @method static Builder|GiftRedeem newQuery()
 * @method static Builder|GiftRedeem query()
 * @method static Builder|GiftRedeem whereGiftId($value)
 * @method static Builder|GiftRedeem whereUserId($value)
 * @mixin Eloquent
 */
class GiftRedeem extends VisionReadOnlyModel
{
    use AsSource, Filterable;

    protected $primaryKey = 'user_id';

    public function account(): BelongsTo
    {
        return $this->belongsTo(AccountData::class, 'user_id');
    }

    public function gift(): BelongsTo
    {
        return $this->belongsTo(GiftCode::class, 'gift_id');
    }
}
