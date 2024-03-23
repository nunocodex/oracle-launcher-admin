<?php

declare(strict_types=1);

namespace App\Http\Controllers\Install;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;

class InstallSetMigrationsController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        if (config('installer.database.seeders', false)) {
            try {
                Artisan::call('migrate', ['--force' => true, '--seed' => config('installer.database.seeders', false)]);

                return redirect()->route('install.keys');
            } catch (Exception $e) {
                return back()->withErrors($e->getMessage())->withInput();
            }
        }

        try {
            Artisan::call('migrate', ['--force' => true]);

            return redirect()->route('install.keys');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }
}
