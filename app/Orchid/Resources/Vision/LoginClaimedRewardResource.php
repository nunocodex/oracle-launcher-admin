<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\AccountData;
use App\Models\Vision\LoginClaimedReward;
use App\Orchid\Resources\VisionResource;
use Illuminate\Contracts\Container\BindingResolutionException;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class LoginClaimedRewardResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = LoginClaimedReward::class;

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
                ->title(__('Account'))
                ->required(),

            Input::make('month')
                ->type('number')
                ->min(1)
                ->max(12)
                ->title(__('Month')),

            Input::make('day')
                ->type('number')
                ->min(1)
                ->max(31)
                ->title(__('Day'))
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
                ->render(function (LoginClaimedReward $model) {
                    return Link::make($model->account->account)
                        ->route('platform.resource.edit', [
                            'resource' => 'account-data-resources',
                            'id' => $model->account->id
                        ]);
                }),

            TD::make('month', __('Month')),
            TD::make('day', __('Day')),
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
