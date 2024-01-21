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
 * App\Models\Vision\LoginClaimedReward
 *
 * @property int $account_id
 * @property int $month
 * @property int $day
 * @property-read AccountData|null $account
 * @method static Builder|LoginClaimedReward defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|LoginClaimedReward filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|LoginClaimedReward filtersApply(iterable $filters = [])
 * @method static Builder|LoginClaimedReward filtersApplySelection($class)
 * @method static Builder|LoginClaimedReward newModelQuery()
 * @method static Builder|LoginClaimedReward newQuery()
 * @method static Builder|LoginClaimedReward query()
 * @method static Builder|LoginClaimedReward whereAccountId($value)
 * @method static Builder|LoginClaimedReward whereDay($value)
 * @method static Builder|LoginClaimedReward whereMonth($value)
 * @property int $id
 * @method static Builder|LoginClaimedReward whereId($value)
 * @mixin Eloquent
 */
class LoginClaimedReward extends VisionReadOnlyModel
{
    use AsSource, Filterable;

    protected $primaryKey = 'account_id';

    public function account(): BelongsTo
    {
        return $this->belongsTo(AccountData::class);
    }
}
