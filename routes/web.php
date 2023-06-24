<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\Information\ActivityController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('coming-soon');
})->name('home');

Route::get('/error-admin', function () { return view('errors.admin'); })->name('error.admin');
Route::get('/error-active', function () { return view('errors.active'); })->name('error.active');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified','active'])
    ->prefix('dashboard')
    ->group(function () {

    Route::middleware(['admin'])->group(function () {
        //Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        //Setting
            //User
            Route::resource('/setting/user', UserController::class);
            Route::get('/profile', [UserController::class, 'profile'])->name('profile');
            Route::put('/profile', [UserController::class, 'updateprofile'])->name('profile.update');
            Route::put('/setting/user-reset/{user}', [UserController::class, 'updatepassword'])->name('user.reset');

        //Information
            //Activity
            Route::resource('/information/activity', ActivityController::class);

        //Table
        Route::get('/setting/user-data', [DataController::class, 'datauser'])->name('user.data');
        Route::get('/information/activity-data', [DataController::class, 'dataactivity'])->name('activity.data');
    });

});
