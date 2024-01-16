<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\ChangelogCategory;
use App\Orchid\Resources\VisionResource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class ChangelogCategoryResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = ChangelogCategory::class;

    public static function permission(): ?string
    {
        return 'platform.vision.changelogs';
    }

    public static function nameWithoutResource(): string
    {
        return __('Changelogs');
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
                ->render(function (ChangelogCategory $model) {
                    return $model->title;
                }),
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
