<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            Menu::make(__('Users'))
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access Controls')),

            Menu::make(__('Roles'))
                ->icon('bs.shield')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->divider(),

            Menu::make(__('Accounts'))
                ->icon('bs.people')
                ->route('platform.resource.list', [
                    'resource' => 'account-data-resources'
                ])
                ->permission('platform.vision.accounts')
                ->title(__('Vision'))
                ->list([
                    Menu::make(__('Avatars'))
                        ->route('platform.resource.list', [
                            'resource' => 'avatar-resources'
                        ]),

                    Menu::make(__('Inventories'))
                        ->route('platform.resource.list', [
                            'resource' => 'account-inventory-resources'
                        ])
                ]),

            Menu::make(__('Articles'))
                ->icon('bi.files')
                ->route('platform.resource.list', [
                    'resource' => 'article-resources'
                ])
                ->permission('platform.vision.articles')
                ->list([
                    Menu::make(__('Positions'))
                        ->route('platform.resource.list', [
                            'resource' => 'article-position-resources'
                        ])
                ]),

            Menu::make(__('Changelogs'))
                ->icon('bi.journals')
                ->route('platform.resource.list', [
                    'resource' => 'changelog-resources'
                ])
                ->permission('platform.vision.changelogs')
                ->list([
                    Menu::make(__('Categories'))
                        ->route('platform.resource.list', [
                            'resource' => 'changelog-category-resources'
                        ])
                ]),

            Menu::make(__('Events'))
                ->icon('bi.calendar-event')
                ->route('platform.resource.list', [
                    'resource' => 'event-resources'
                ])
                ->permission('platform.vision.events'),

            Menu::make(__('Faqs'))
                ->icon('bi.question-lg')
                ->route('platform.resource.list', [
                    'resource' => 'faq-resources'
                ])
                ->permission('platform.vision.faqs'),

            Menu::make(__('Gifts'))
                ->icon('bi.gift')
                ->route('platform.resource.list', [
                    'resource' => 'gift-code-resources'
                ])
                ->permission('platform.vision.gifts')
                ->list([
                    Menu::make(__('Redeems'))
                        ->route('platform.resource.list', [
                            'resource' => 'gift-redeem-resources'
                        ])
                ]),

            Menu::make(__('Rewards'))
                ->icon('bs.gift')
                ->route('platform.resource.list', [
                    'resource' => 'reward-resources'
                ])
                ->permission('platform.vision.rewards'),
        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),

            ItemPermission::group(__('Vision'))
                ->addPermission('platform.vision.accounts', __('Accounts'))
                ->addPermission('platform.vision.articles', __('Articles'))
                ->addPermission('platform.vision.changelogs', __('Changelogs'))
                ->addPermission('platform.vision.events', __('Events'))
                ->addPermission('platform.vision.faqs', __('Faqs'))
                ->addPermission('platform.vision.gifts', __('Gifts'))
                ->addPermission('platform.vision.rewards', __('Rewards'))
        ];
    }
}
