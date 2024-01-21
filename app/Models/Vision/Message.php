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
 * App\Models\Vision\Message
 *
 * @property int $id
 * @property int $parent_id
 * @property int $sender_id
 * @property int $receiver_id
 * @property string|null $title
 * @property string $message
 * @property string $date_edited
 * @property int $seen
 * @property string|null $date_seen
 * @property-read Message|null $parent
 * @property-read AccountData|null $receiver
 * @property-read AccountData|null $sender
 * @method static Builder|Message defaultSort(string $column, string $direction = 'asc')
 * @method static Builder|Message filters(?mixed $kit = null, ?HttpFilter $httpFilter = null)
 * @method static Builder|Message filtersApply(iterable $filters = [])
 * @method static Builder|Message filtersApplySelection($class)
 * @method static Builder|Message newModelQuery()
 * @method static Builder|Message newQuery()
 * @method static Builder|Message query()
 * @method static Builder|Message whereDateEdited($value)
 * @method static Builder|Message whereDateSeen($value)
 * @method static Builder|Message whereId($value)
 * @method static Builder|Message whereMessage($value)
 * @method static Builder|Message whereParentId($value)
 * @method static Builder|Message whereReceiverId($value)
 * @method static Builder|Message whereSeen($value)
 * @method static Builder|Message whereSenderId($value)
 * @method static Builder|Message whereTitle($value)
 * @mixin Eloquent
 */
class Message extends VisionModel
{
    use AsSource, Filterable;

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'parent_id', 'id');
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(AccountData::class, 'sender_id', 'id');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(AccountData::class, 'receiver_id', 'id');
    }
}
