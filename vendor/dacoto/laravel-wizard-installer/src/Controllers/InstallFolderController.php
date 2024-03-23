<?php

declare(strict_types=1);

namespace dacoto\LaravelWizardInstaller\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class InstallFolderController extends Controller
{
    public function __invoke(): View|Factory|Application|RedirectResponse
    {
        if (! (new InstallServerController())->check()) {
            return redirect()->route('install.server');
        }

        return view('installer::steps.folders', [
            'result' => $this->check(),
        ]);
    }

    public function check(): bool
    {
        foreach (config('installer.folders') as $check) {
            if (@File::chmod($check['check']['value']) < 755) {
                return false;
            }
        }

        return true;
    }
}
