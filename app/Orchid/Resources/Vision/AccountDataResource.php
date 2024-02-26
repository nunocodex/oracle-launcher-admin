<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\AccountData;
use App\Orchid\Resources\VisionResource;
use App\Orchid\Screens\Layouts\Avatar;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class AccountDataResource extends VisionResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = AccountData::class;

    public static function permission(): ?string
    {
        return 'platform.vision.accounts';
    }

    public static function nameWithoutResource(): string
    {
        return __('Account');
    }

    public function rules(Model $model): array
    {
        return [
            'account' => [
                'required',
                Rule::unique(static::$model, 'account')
                    ->ignore($model)
            ],

            'public_nickname' => [
                'required',
                Rule::unique(static::$model, 'public_nickname')
                    ->ignore($model)
                    ->whereNot('public_nickname', 'not set..')
            ]
        ];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('avatar.image_url')
                ->type('url')
                ->title('Avatar URL')
                ->required(),

            Input::make('account')
                ->title(__('Account'))
                ->required(),

            Input::make('email')
                ->title(__('Email'))
                ->type('email')
                ->required(),

            Input::make('last_ip_address')
                ->title(__('Last IP Address'))
                ->disabled(),

            Input::make('access_token')
                ->title(__('Access Token'))
                ->disabled(),

            Input::make('token_valid_until')
                ->title(__('Token Valid Until'))
                ->disabled(),

            Input::make('public_nickname')
                ->title(__('Public Nickname'))
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
            TD::make('avatar.image_url', __('Avatar'))
                ->render(fn(AccountData $model) => $model->presenter()?->image() ? new Avatar($model->presenter()) : '')
                ->cantHide(),

            TD::make('account', __('Account'))
                ->cantHide(),
            TD::make('email', __('Email'))
                ->cantHide(),

            TD::make('last_ip_address', __('Last IP Address')),
            TD::make('access_token', __('Access Token')),
            TD::make('token_valid_until', __('Token Valid Until'))
                ->render(fn(AccountData $model) => date(config('app.default_datetime_format'), $model->token_valid_until)),

            TD::make('public_nickname', __('Public Nickname'))
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

    /**
     * @throws Exception
     */
    public function onSave(ResourceRequest $request, AccountData $model): void
    {
        $model->forceFill($request->except([
            'avatar'
        ]))->save();

        if (!$model->avatar) {
            $avatar = new \App\Models\Vision\Avatar();
            $avatar->image_url = $request->input('avatar.image_url');
            $avatar->account_id = $model->id;
            $avatar->save();
        } else {
            $model->avatar->image_url = $request->input('avatar.image_url');
            $model->avatar->save();
        }
    }
}
