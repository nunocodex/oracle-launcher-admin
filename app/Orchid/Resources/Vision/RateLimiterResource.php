<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\RateLimiter;
use App\Orchid\Resources\VisionResource;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class RateLimiterResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = RateLimiter::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('ip_address', __('IP Address')),
            TD::make('type', __('Type')),
            TD::make('count', __('Count')),

            TD::make('date', __('Date'))
                ->render(fn(RateLimiter $model) => $model->date->toDateTimeString())
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
