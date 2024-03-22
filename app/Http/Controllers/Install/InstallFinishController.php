<?php

declare(strict_types=1);

namespace App\Http\Controllers\Install;

use App\Models\User;
use dacoto\EnvSet\EnvSetEditor;
use dacoto\EnvSet\Exceptions\KeyNotFoundException;
use dacoto\EnvSet\Exceptions\UnableReadFileException;
use dacoto\LaravelWizardInstaller\Controllers\InstallFolderController;
use dacoto\LaravelWizardInstaller\Controllers\InstallServerController;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use JsonException;

class InstallFinishController extends Controller
{
    public function __construct(
        public readonly EnvSetEditor $envEditor,
    )
    {
    }

    /**
     * @throws JsonException
     * @throws KeyNotFoundException
     * @throws UnableReadFileException
     */
    public function __invoke(Request $request): View|Factory|Application|RedirectResponse
    {
        $connectedToDb = false;

        try {
            DB::connection()->getPdo();
            $connectedToDb = true;
        } catch (Exception) {
        }

        if (
            !$connectedToDb ||
            empty($this->envEditor->getValue('APP_KEY')) ||
            !(new InstallServerController())->check() ||
            !(new InstallFolderController())->check()
        ) {
            return redirect()->route('install.database');
        }

        if (config('installer.admin_area.user')) {
            $users = User::query()
                ->count();

            if ($users) {
                $admin = User::query()
                    ->where('name', config('installer.admin_area.user.name'))
                    ->where('email', config('installer.admin_area.user.email'))
                    ->first();

                if (!$admin) {
                    $user = new User();
                    $user->name = config('installer.admin_area.user.name');
                    $user->email = config('installer.admin_area.user.email');
                    $user->password = \Hash::make(config('installer.admin_area.user.password'));
                    $user->permissions = json_decode('{"platform.index": "1", "platform.systems.roles": "1", "platform.systems.users": "1", "platform.systems.attachment": "1"}');
                    $user->save();
                }
            }

        }

        $data = [
            'url' => config('app.url'),
            'date' => date('Y/m/d h:i:s'),
        ];

        file_put_contents(storage_path('installed'), json_encode($data, JSON_THROW_ON_ERROR), FILE_APPEND | LOCK_EX);

        Artisan::call('route:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');

        return view('installer::steps.finish', ['base' => url('/'), 'login' => url(config('installer.login'))]);
    }
}
