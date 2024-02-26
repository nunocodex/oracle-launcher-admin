<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Vision\AccountData;
use App\Models\VisionModel;
use App\Models\VisionReadOnlyModel;
use App\Policies\Vision\AccountDataPolicy;
use App\Policies\VisionPolicy;
use App\Policies\VisionReadOnlyPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        AccountData::class => AccountDataPolicy::class,
        VisionModel::class => VisionPolicy::class,
        VisionReadOnlyModel::class => VisionReadOnlyPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
