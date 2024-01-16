<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\AccountData;
use App\Models\Vision\Avatar;
use App\Orchid\Resources\VisionResource;
use Illuminate\Contracts\Container\BindingResolutionException;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class AvatarResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Avatar::class;

    public static function permission(): ?string
    {
        return 'platform.vision.accounts';
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
            Relation::make('account_id')
                ->fromModel(AccountData::class, 'account')
                ->title(__('Account')),

            Picture::make('image_url')
                ->targetUrl()
                ->title('Image')
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
            TD::make('account_id', __('Account'))
                ->render(function (Avatar $model) {
                    return Link::make($model->account->account)
                        ->route('platform.resource.edit', [
                            'resource' => 'account-data-resources',
                            'id' => $model->account->id
                        ]);
                }),

            TD::make('image_url', __('Image'))
                ->render(function (Avatar $model) {
                    return '<img src="' . $model->image_url . '" style="width:80px; height:80px;">';
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
