<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\Reward;
use App\Orchid\Resources\VisionResource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class RewardResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Reward::class;

    public static function permission(): ?string
    {
        return 'platform.vision.rewards';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('title')
                ->title(__('Title'))
                ->required(),
            Picture::make('picture_url')
                ->targetUrl()
                ->title('Picture')
                ->required(),
            TextArea::make('description')
                ->title(__('Description'))
                ->rows(4)
                ->required(),
            Input::make('soap_command')
                ->title(__('Soap Command'))
                ->required(),
            Group::make([
                Input::make('requires_player')
                    ->title(__('Requires Player'))
                    ->type('number')
                    ->min(1),
                Input::make('requires_input')
                    ->title(__('Requires Input'))
                    ->type('number')
                    ->min(0)
            ])
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
            TD::make('title', __('Title'))
                ->cantHide(),
            TD::make('picture_url', __('Picture'))
                ->render(function (Reward $model) {
                    return '<img src="' . $model->picture_url . '" style="width:80px; height:80px;">';
                })
                ->cantHide(),
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
