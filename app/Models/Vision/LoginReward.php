<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\LoginReward
 *
 * @method static \Illuminate\Database\Eloquent\Builder|LoginReward defaultSort(string $column, string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|LoginReward filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginReward filtersApply(iterable $filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder|LoginReward filtersApplySelection($class)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginReward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginReward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginReward query()
 * @property int $month
 * @property int $day
 * @property int $reward_id
 * @method static \Illuminate\Database\Eloquent\Builder|LoginReward whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginReward whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginReward whereRewardId($value)
 * @mixin \Eloquent
 */
class LoginReward extends VisionModel
{
    use AsSource, Filterable, Attachable;
}
