<?php

declare(strict_types=1);

namespace App\Http\Controllers\Install;

use dacoto\EnvSet\EnvSetEditor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class InstallIndexController extends Controller
{
    public function __construct(
        public readonly EnvSetEditor $envEditor
    )
    {
    }

    public function __invoke(): Factory|View|Application
    {
        return view('installer::steps.welcome');
    }
}
