<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\AccountInventory;
use App\Orchid\Resources\VisionResource;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class AccountInventoryResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = AccountInventory::class;

    public static function permission(): ?string
    {
        return 'platform.vision.accounts';
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
            TD::make('account_id', __('Account'))
                ->render(function (AccountInventory $model) {
                    return Link::make($model->account->account)
                        ->route('platform.resource.edit', [
                            'resource' => 'account-data-resources',
                            'id' => $model->account->id
                        ]);
                }),

            TD::make('reward_id', __('Reward'))
                ->render(function (AccountInventory $model) {
                    return Link::make($model->reward->title)
                        ->route('platform.resource.edit', [
                            'resource' => 'reward-resources',
                            'id' => $model->reward->id
                        ]);
                }),

            TD::make('acquired_on', __('Acquired On'))
                ->render(fn(AccountInventory $model) => $model->acquired_on->toDateTimeString()),
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
