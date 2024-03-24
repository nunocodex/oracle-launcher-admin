<?php

use App\Http\Controllers\Install\InstallAdminController;
use App\Http\Controllers\Install\InstallFinishController;
use App\Http\Controllers\Install\InstallIndexController;
use App\Http\Controllers\Install\InstallSetAdminController;
use App\Http\Controllers\Install\InstallSetDatabaseController;
use App\Http\Controllers\Install\InstallSetMigrationsController;
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
    Route::get('/', ['as' => 'install.index', 'uses' => InstallIndexController::class]);
    Route::post('/database', ['uses' => InstallSetDatabaseController::class]);
    Route::get('/admin', ['as' => 'install.admin', 'uses' => InstallAdminController::class]);
    Route::post('/admin', ['uses' => InstallSetAdminController::class]);
    Route::post('/migrations', ['uses' => InstallSetMigrationsController::class]);
    Route::get('/finish', ['as' => 'install.finish', 'uses' => InstallFinishController::class]);
});

require __DIR__ . '/auth.php';
