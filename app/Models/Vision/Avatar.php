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
 * App\Models\Vision\Avatar
 *
 * @property-read AccountData|null $account
 * @method static Builder|Avatar defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|Avatar filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|Avatar filtersApply(iterable $filters = [])
 * @method static Builder|Avatar filtersApplySelection($class)
 * @method static Builder|Avatar newModelQuery()
 * @method static Builder|Avatar newQuery()
 * @method static Builder|Avatar query()
 * @property int $account_id
 * @property string $image_url
 * @method static Builder|Avatar whereAccountId($value)
 * @method static Builder|Avatar whereImageUrl($value)
 * @mixin Eloquent
 */
class Avatar extends VisionModel
{
    use AsSource, Filterable;
    
    protected $primaryKey = 'account_id';

    protected $fillable = [
        'account_id',
        'image_url',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(AccountData::class);
    }
}
