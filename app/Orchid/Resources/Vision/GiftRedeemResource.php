<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\GiftRedeem;
use App\Orchid\Resources\VisionResource;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class GiftRedeemResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = GiftRedeem::class;

    public static function permission(): ?string
    {
        return 'platform.vision.gifts';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            TD::make('gift_id', __('Gift'))
                ->render(function (GiftRedeem $model) {
                    return Link::make($model->gift->reward->title)
                        ->route('platform.resource.edit', [
                            'resource' => 'reward-resources',
                            'id' => $model->gift->id
                        ]);
                }),
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
            TD::make('user_id', __('Account'))
                ->render(function (GiftRedeem $model) {
                    return Link::make($model->account->account)
                        ->route('platform.resource.edit', [
                            'resource' => 'account-data-resources',
                            'id' => $model->account->id
                        ]);
                }),

            TD::make('gift_id', __('Gift'))
                ->render(function (GiftRedeem $model) {
                    return Link::make($model->gift->code)
                        ->route('platform.resource.edit', [
                            'resource' => 'gift-code-resources',
                            'id' => $model->gift->id
                        ]);
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
