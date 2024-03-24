<?php

declare(strict_types=1);

namespace App\Http\Controllers\Install;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class InstallSetAdminController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $admin_username = $request->input('admin_username');
        $admin_email = $request->input('admin_email');
        $admin_password = $request->input('admin_password');

        if ($admin_username && $admin_email && $admin_password) {
            $user = User::query()
                ->where('name', $admin_username)
                ->where('email', $admin_email)
                ->get();

            if (!$user) {
                $admin = new User();

                $admin->name = $admin_username;
                $admin->email = $admin_email;
                $admin->email_verified_at = Carbon::now();
                $admin->password = Hash::make($admin_password);
                $admin->permissions = json_decode('{"platform.index": true, "platform.vision.faqs": true, "platform.vision.gifts": true, "platform.systems.roles": true, "platform.systems.users": true, "platform.vision.events": true, "platform.vision.rewards": true, "platform.vision.sliders": true, "platform.vision.accounts": true, "platform.vision.articles": true, "platform.vision.messages": true, "platform.vision.teleports": true, "platform.vision.changelogs": true, "platform.systems.attachment": true, "platform.vision.login_rewards": true}');

                $admin->save();

                session('installer.admin.account', [
                    'username' => $admin_username,
                    'email' => $admin_email,
                    'password' => $admin_password
                ]);
            }
        } elseif (!User::count()) {
            return back()
                ->withErrors(__('No admin account, required create one.'))
                ->withInput();
        }

        return redirect()->route('install.finish');
    }
}
