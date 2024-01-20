<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Filters\HttpFilter;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\LoginReward
 *
 * @method static Builder|LoginReward defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|LoginReward filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|LoginReward filtersApply(iterable $filters = [])
 * @method static Builder|LoginReward filtersApplySelection($class)
 * @method static Builder|LoginReward newModelQuery()
 * @method static Builder|LoginReward newQuery()
 * @method static Builder|LoginReward query()
 * @property int $month
 * @property int $day
 * @property int $reward_id
 * @method static Builder|LoginReward whereDay($value)
 * @method static Builder|LoginReward whereMonth($value)
 * @method static Builder|LoginReward whereRewardId($value)
 * @property-read Reward $reward
 * @mixin Eloquent
 */
class LoginReward extends VisionModel
{
    use AsSource, Filterable;

    protected $fillable = [
        'month',
        'day',
        'reward_id',
    ];

    public function reward(): BelongsTo
    {
        return $this->belongsTo(Reward::class);
    }
}
