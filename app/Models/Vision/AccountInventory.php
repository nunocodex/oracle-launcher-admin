<?php

namespace App\Models\Vision;

use App\Models\VisionReadOnlyModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\AccountInventory
 *
 * @property-read AccountData|null $account
 * @property-read Reward|null $reward
 * @method static Builder|AccountInventory defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|AccountInventory filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static Builder|AccountInventory filtersApply(iterable $filters = [])
 * @method static Builder|AccountInventory filtersApplySelection($class)
 * @method static Builder|AccountInventory newModelQuery()
 * @method static Builder|AccountInventory newQuery()
 * @method static Builder|AccountInventory query()
 * @property int $account_id
 * @property int $reward_id
 * @property Carbon $acquired_on
 * @method static Builder|AccountInventory whereAccountId($value)
 * @method static Builder|AccountInventory whereAcquiredOn($value)
 * @method static Builder|AccountInventory whereRewardId($value)
 * @mixin Eloquent
 */
class AccountInventory extends VisionReadOnlyModel
{
    use AsSource, Filterable;

    protected $primaryKey = 'account_id';

    protected $table = 'account_inventory';

    protected $fillable = [
        'account_id',
        'reward_id',
        'acquired_on',
    ];

    protected $casts = [
        'acquired_on' => 'datetime',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(AccountData::class);
    }

    public function reward(): BelongsTo
    {
        return $this->belongsTo(Reward::class);
    }
}
