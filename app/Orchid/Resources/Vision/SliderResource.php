<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\Slider;
use App\Orchid\Resources\VisionResource;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class SliderResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Slider::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Picture::make('image_url')
                ->targetUrl()
                ->title('Image')
                ->required(),
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
            TD::make('image_url', __('Image'))
                ->render(fn(Slider $model) => $model->image_thumbnail)
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
