<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\Changelog;
use App\Orchid\Resources\VisionResource;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\TD;

class ChangelogResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Changelog::class;

    public static function permission(): ?string
    {
        return 'platform.vision.changelogs';
    }

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
            TD::make('category', __('Category'))
                ->render(function (Changelog $model) {
                    return Link::make($model->cat->title)
                        ->route('platform.resource.edit', [
                            'resource' => 'changelog-category-resources',
                            'id' => $model->cat->id
                        ]);
                }),

            TD::make('title', __('Title'))
                ->render(function (Changelog $model) {
                    return $model->title;
                }),

            TD::make('date', __('Date'))
                ->render(function (Changelog $model) {
                    return $model->date->toDateTimeString();
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
