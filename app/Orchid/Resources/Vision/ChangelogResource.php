<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\Changelog;
use App\Models\Vision\ChangelogCategory;
use App\Orchid\Resources\VisionResource;
use Illuminate\Contracts\Container\BindingResolutionException;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
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
     * @throws BindingResolutionException
     */
    public function fields(): array
    {
        return [
            Relation::make('category')
                ->fromModel(ChangelogCategory::class, 'title')
                ->title(__('Category'))
                ->required(),

            Cropper::make('icon_url')
                ->targetUrl()
                ->width(80)
                ->height(80)
                ->title('Icon')
                ->required(),

            Input::make('title')
                ->title(__('Title'))
                ->required(),

            TextArea::make('description')
                ->title(__('Description'))
                ->required(),

            DateTimer::make('date')
                ->enableTime()
                ->format24hr()
                ->title(__('Date'))
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
            TD::make('category', __('Category'))
                ->render(function (Changelog $model) {
                    return Link::make($model->cat->title)
                        ->route('platform.resource.edit', [
                            'resource' => 'changelog-category-resources',
                            'id' => $model->cat->id
                        ]);
                }),

            TD::make('icon_url', __('Icon'))
                ->render(fn(Changelog $model) => $model->icon_thumbnail)
                ->cantHide(),

            TD::make('title', __('Title')),

            TD::make('date', __('Date'))
                ->render(fn(Changelog $model) => $model->date->toDateTimeString()),
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
