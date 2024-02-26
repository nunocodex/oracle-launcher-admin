<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\AccountData;
use App\Models\Vision\Article;
use App\Models\Vision\ArticlePosition;
use App\Orchid\Resources\VisionResource;
use Illuminate\Contracts\Container\BindingResolutionException;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Throwable;

class ArticleResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Article::class;

    public static function permission(): ?string
    {
        return 'platform.vision.articles';
    }

    public static function nameWithoutResource_(): string
    {
        return __('Article');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     * @throws BindingResolutionException
     * @throws Throwable
     */
    public function fields(): array
    {
        return [
            Relation::make('author_id')
                ->fromModel(AccountData::class, 'account')
                ->title(__('Account'))
                ->required(),

            Input::make('picture_url')
                ->type('url')
                ->title(__('Picture URL'))
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

            Relation::make('position')
                ->fromModel(ArticlePosition::class, 'name')
                ->title(__('Position'))
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
            TD::make('author_id', __('Author'))
                ->render(function (Article $model) {
                    return Link::make($model->author->account)
                        ->route('platform.resource.edit', [
                            'resource' => 'account-data-resources',
                            'id' => $model->author->id
                        ]);
                }),

            TD::make('title', __('Title')),

            TD::make('picture_url', __('Picture'))
                ->render(fn(Article $model) => str_ends_with($model->picture_url, '.mp4') ? $model->movie_thumbnail : $model->picture_thumbnail)
                ->cantHide(),

            TD::make('location', __('Position'))
                ->render(function (Article $model) {
                    return Link::make($model->location->name)
                        ->route('platform.resource.edit', [
                            'resource' => 'article-position-resources',
                            'id' => $model->location->id
                        ]);
                }),

            TD::make('date', 'Date')
                ->render(fn(Article $model) => $model->date->toDateTimeString()),

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
