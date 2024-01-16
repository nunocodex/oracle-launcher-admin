<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * App\Models\Vision\AccountData
 *
 * @property-read Avatar|null $avatar
 * @property-read Collection<int, AccountInventory> $inventories
 * @property-read int|null $inventories_count
 * @property-read Collection<int, Reward> $rewards
 * @property-read int|null $rewards_count
 * @method static Builder|AccountData defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|AccountData filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static Builder|AccountData filtersApply(iterable $filters = [])
 * @method static Builder|AccountData filtersApplySelection($class)
 * @method static Builder|AccountData newModelQuery()
 * @method static Builder|AccountData newQuery()
 * @method static Builder|AccountData query()
 * @property int $id
 * @property string $account
 * @property string|null $email
 * @property string|null $last_ip_address
 * @property string $access_token
 * @property int $token_valid_until
 * @property string|null $public_nickname
 * @method static Builder|AccountData whereAccessToken($value)
 * @method static Builder|AccountData whereAccount($value)
 * @method static Builder|AccountData whereEmail($value)
 * @method static Builder|AccountData whereId($value)
 * @method static Builder|AccountData whereLastIpAddress($value)
 * @method static Builder|AccountData wherePublicNickname($value)
 * @method static Builder|AccountData whereTokenValidUntil($value)
 * @mixin Eloquent
 */
class AccountData extends VisionModel
{
    use AsSource, Filterable, Attachable;

    protected $fillable = [
        'account',
        'email',
        'last_ip_address',
        'access_token',
        'token_valid_until',
        'public_nickname',
    ];

    public function inventories(): HasMany
    {
        return $this->hasMany(AccountInventory::class, 'id', 'account_id');
    }

    public function rewards(): HasMany
    {
        return $this->hasMany(Reward::class);
    }

    public function avatar(): BelongsTo
    {
        return $this->belongsTo(Avatar::class);
    }
}
