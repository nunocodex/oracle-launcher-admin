<?php

declare(strict_types=1);

namespace App\Http\Controllers\Install;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class InstallAdminController extends Controller
{
    public function __invoke(): View|Factory|Application|RedirectResponse
    {
        return view('installer::steps.admin');
    }
}
