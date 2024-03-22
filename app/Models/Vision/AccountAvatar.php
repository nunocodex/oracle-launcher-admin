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
 * @method static Builder|AccountAvatar defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|AccountAvatar filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|AccountAvatar filtersApply(iterable $filters = [])
 * @method static Builder|AccountAvatar filtersApplySelection($class)
 * @method static Builder|AccountAvatar newModelQuery()
 * @method static Builder|AccountAvatar newQuery()
 * @method static Builder|AccountAvatar query()
 * @property int $account_id
 * @property string $image_url
 * @method static Builder|AccountAvatar whereAccountId($value)
 * @method static Builder|AccountAvatar whereImageUrl($value)
 * @mixin Eloquent
 */
class AccountAvatar extends VisionModel
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
