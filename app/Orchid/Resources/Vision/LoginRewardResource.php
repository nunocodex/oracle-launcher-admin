<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\LoginReward;
use App\Models\Vision\Reward;
use App\Orchid\Resources\VisionResource;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class LoginRewardResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = LoginReward::class;

    public static function permission(): ?string
    {
        return 'platform.vision.login_rewards';
    }

    public function rules(Model $model): array
    {
        return [
            'month' => [
                'required',
                Rule::unique(static::$model, 'day'),
            ],

            'day' => [
                'required',
                Rule::unique(static::$model, 'month'),
            ]
        ];
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
            Input::make('month')
                ->type('number')
                ->min(1)
                ->max(12)
                ->title(__('Month'))
                ->required(),

            Input::make('day')
                ->type('number')
                ->min(1)
                ->max(31)
                ->title(__('Day'))
                ->required(),

            Relation::make('reward_id')
                ->fromModel(Reward::class, 'title')
                ->title(__('Reward'))
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
            TD::make('month', __('Month')),
            TD::make('day', __('Day')),
            TD::make('reward_id', __('Reward'))
                ->render(function (LoginReward $model) {
                    return Link::make($model->reward->title)
                        ->route('platform.resource.edit', [
                            'resource' => 'reward-resources',
                            'id' => $model->reward->id
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
