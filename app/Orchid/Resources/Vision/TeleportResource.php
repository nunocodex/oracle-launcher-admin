<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\Teleport;
use App\Orchid\Resources\VisionResource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class TeleportResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Teleport::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('name')
                ->title(__('Name'))
                ->required(),

            Input::make('map')
                ->type('number')
                ->title(__('Map'))
                ->required(),

            Group::make([
                Input::make('dest_x')
                    ->type('number')
                    ->title(__('Dest X'))
                    ->required(),

                Input::make('dest_y')
                    ->type('number')
                    ->title(__('Dest Y'))
                    ->required(),

                Input::make('dest_z')
                    ->type('number')
                    ->title(__('Dest Z'))
                    ->required(),
            ]),

            Input::make('orientation')
                ->type('number')
                ->title(__('Orientation'))
                ->required(),

            Group::make([
                Input::make('dp_or_bpc_price')
                    ->type('number')
                    ->title(__('DP or BPC Price'))
                    ->required(),

                Input::make('vp_price')
                    ->type('number')
                    ->title(__('VP Price'))
                    ->required(),
            ]),

            Group::make([
                Switcher::make('alliance_allowed')
                    ->title(__('Alliance Allowed'))
                    ->sendTrueOrFalse(),

                Switcher::make('horde_allowed')
                    ->title(__('Horde Allowed'))
                    ->sendTrueOrFalse(),
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
            TD::make('name', __('Name')),
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
