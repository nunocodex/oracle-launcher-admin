<?php

namespace App\Models\Vision;

use App\Models\VisionReadOnlyModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Orchid\Filters\Filterable;
use Orchid\Filters\HttpFilter;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\RateLimiter
 *
 * @property int $id
 * @property string $ip_address
 * @property int $type
 * @property int $count
 * @property Carbon $date
 * @method static Builder|RateLimiter defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|RateLimiter filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|RateLimiter filtersApply(iterable $filters = [])
 * @method static Builder|RateLimiter filtersApplySelection($class)
 * @method static Builder|RateLimiter newModelQuery()
 * @method static Builder|RateLimiter newQuery()
 * @method static Builder|RateLimiter query()
 * @method static Builder|RateLimiter whereCount($value)
 * @method static Builder|RateLimiter whereDate($value)
 * @method static Builder|RateLimiter whereId($value)
 * @method static Builder|RateLimiter whereIpAddress($value)
 * @method static Builder|RateLimiter whereType($value)
 * @mixin Eloquent
 */
class RateLimiter extends VisionReadOnlyModel
{
    use AsSource, Filterable;

    protected $table = 'rate_limiter';

    protected $casts = [
        'date' => 'datetime'
    ];
}
