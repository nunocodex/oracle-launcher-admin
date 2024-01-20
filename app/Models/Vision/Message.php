<?php

namespace App\Models\Vision;

use App\Models\VisionModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

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
