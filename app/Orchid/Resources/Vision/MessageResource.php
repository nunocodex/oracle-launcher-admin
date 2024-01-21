<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\AccountData;
use App\Models\Vision\Message;
use App\Orchid\Resources\VisionResource;
use Illuminate\Contracts\Container\BindingResolutionException;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class MessageResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Message::class;

    public static function permission(): ?string
    {
        return 'platform.vision.messages';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     * @throws BindingResolutionException
     */
    public function fields(): array
    {
        return [
            Relation::make('parent_id')
                ->fromModel(Message::class, 'title')
                ->allowEmpty()
                ->value(0)
                ->title(__('Parent')),

            Relation::make('sender_id')
                ->fromModel(AccountData::class, 'account')
                ->title(__('Sender'))
                ->required(),

            Relation::make('receiver_id')
                ->fromModel(AccountData::class, 'account')
                ->title(__('Receiver'))
                ->required(),

            Input::make('title')
                ->title(__('Title'))
                ->required(),

            TextArea::make('message')
                ->title(__('Message'))
                ->required()
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('sender_id', __('Sender'))
                ->render(function (Message $model) {
                    return Link::make($model->sender->account)
                        ->route('platform.resource.edit', [
                            'resource' => 'account-data-resources',
                            'id' => $model->sender->id
                        ]);
                }),

            TD::make('receiver_id', __('Receiver'))
                ->render(function (Message $model) {
                    return Link::make($model->receiver->account)
                        ->route('platform.resource.edit', [
                            'resource' => 'account-data-resources',
                            'id' => $model->receiver->id
                        ]);
                }),

            TD::make('title', __('Title')),

            TD::make('parent_id', __('Parent'))
                ->render(function (Message $model) {
                    return $model->parent_id ? Link::make($model->parent->title)
                        ->route('platform.resource.edit', [
                            'resource' => 'message-resources',
                            'id' => $model->parent_id
                        ]) : '';
                }),

            TD::make('date_edited', __('Date Edited')),
            TD::make('seen', __('Seen')),
            TD::make('date_seen', __('Date Seen')),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
