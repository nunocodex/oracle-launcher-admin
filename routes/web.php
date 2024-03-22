<?php

use App\Http\Controllers\Install\InstallFinishController;
use App\Http\Controllers\Install\InstallSetDatabaseController;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
    return redirect(RouteServiceProvider::HOME);
});

Route::group([
    'prefix' => 'install',
    'namespace' => 'App\Http\Controllers\Install',
    'middleware' => ['web', 'installer']
], static function () {
    Route::post('/database', ['uses' => InstallSetDatabaseController::class]);
    Route::get('/finish', ['as' => 'install.finish', 'uses' => InstallFinishController::class]);
});

require __DIR__ . '/auth.php';
