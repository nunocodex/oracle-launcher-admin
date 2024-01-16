<?php

namespace App\Orchid\Resources\Vision;

use App\Models\Vision\AccountData;
use App\Orchid\Resources\VisionResource;
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

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('account')
                ->title(__('Account'))
                ->required(),

            Input::make('email')
                ->title(__('Email'))
                ->type('email')
                ->required(),

            Input::make('last_ip_address')
                ->title(__('Last IP Address'))
                ->required(),

            Input::make('access_token')
                ->title(__('Access Token'))
                ->required(),

            Input::make('token_valid_until')
                ->title(__('Token Valid Until'))
                ->type('number')
                ->required(),

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
            TD::make('account', __('Account'))
                ->cantHide(),
            TD::make('email', __('Email'))
                ->cantHide(),

            TD::make('last_ip_address', __('Last IP Address')),
            TD::make('access_token', __('Access Token')),
            TD::make('token_valid_until', __('Token Valid Until')),

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
}
