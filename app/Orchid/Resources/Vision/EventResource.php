<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\Event;
use App\Orchid\Resources\VisionResource;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class EventResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Event::class;

    public static function permission(): ?string
    {
        return 'platform.vision.events';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Picture::make('picture_url')
                ->targetUrl()
                ->title('Picture')
                ->required(),

            Input::make('redirect_url')
                ->type('url')
                ->title(__('Redirect URL'))
                ->required(),

            Input::make('title')
                ->title(__('Title'))
                ->required(),

            TextArea::make('content')
                ->title(__('Content'))
                ->required(),

            DateTimer::make('expiry_date')
                ->title(__('Expiry Date'))
                ->enableTime()
                ->format24hr()
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
            TD::make('picture_url', __('Picture'))
                ->render(fn(Event $model) => $model->picture_thumbnail)
                ->cantHide(),

            TD::make('title', __('Title')),

            TD::make('expiry_date', __('Expiry Date'))
                ->render(fn(Event $model) => $model->expiry_date->toDateTimeString())
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
