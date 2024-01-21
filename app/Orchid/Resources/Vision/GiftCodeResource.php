<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\GiftCode;
use App\Models\Vision\Reward;
use App\Orchid\Resources\VisionResource;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class GiftCodeResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = GiftCode::class;

    public static function permission(): ?string
    {
        return 'platform.vision.gifts';
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
            Input::make('code')
                ->title(__('Code'))
                ->required(),

            Relation::make('reward_id')
                ->fromModel(Reward::class, 'title')
                ->title(__('Reward'))
                ->required(),

            Input::make('redeems_allowed')
                ->type('number')
                ->title(__('Redeems Allowed'))
                ->required(),

            DateTimer::make('valid_until')
                ->format24hr()
                ->enableTime()
                ->title(__('Valid Until'))
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
            TD::make('code', __('Code'))
                ->cantHide(),

            TD::make('reward_id', __('Reward'))
                ->render(function (GiftCode $model) {
                    return Link::make($model->reward->title)
                        ->route('platform.resource.edit', [
                            'resource' => 'reward-resources',
                            'id' => $model->reward->id
                        ]);
                }),

            TD::make('redeems_allowed', __('Redeems Allowed')),

            TD::make('valid_until', __('Valid Until'))
                ->render(fn(GiftCode $model) => $model->valid_until->toDateTimeString())
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

    public function rules(Model $model): array
    {
        return [
            'code' => [
                'required',
                Rule::unique(static::$model, 'code')
                    ->ignore($model),
            ]
        ];
    }
}
