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
use Illuminate\Support\Facades\Hash;
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

        $config = config('installer.admin_area.user');

        if ($config) {
            $admin = User::find(1);

            if (!$admin) {
                $admin = new User();

                $admin->name = $config['name'];
                $admin->email = $config['email'];
                $admin->password = Hash::make($config['password']);
                $admin->permissions = json_decode('{"platform.index": true, "platform.vision.faqs": true, "platform.vision.gifts": true, "platform.systems.roles": true, "platform.systems.users": true, "platform.vision.events": true, "platform.vision.rewards": true, "platform.vision.sliders": true, "platform.vision.accounts": true, "platform.vision.articles": true, "platform.vision.messages": true, "platform.vision.teleports": true, "platform.vision.changelogs": true, "platform.systems.attachment": true, "platform.vision.login_rewards": true}');

                $admin->save();
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
