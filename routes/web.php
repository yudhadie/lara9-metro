<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\ErrorController;
use App\Http\Controllers\Admin\Information\ActivityController;
use App\Http\Controllers\Admin\Setting\TeamController;
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

//Error Page
Route::get('/error-admin', [ErrorController::class, 'admin'])->name('error.admin');
Route::get('/error-active', [ErrorController::class, 'active'])->name('error.active');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified','active'])
    ->prefix('dashboard')
    ->group(function () {

    Route::middleware(['admin'])->group(function () {
        //Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        //Setting
            //Role
            Route::resource('/setting/role', TeamController::class);
            //User
            Route::resource('/setting/user', UserController::class);
            Route::get('/profile', [UserController::class, 'profile'])->name('profile');
            Route::put('/profile', [UserController::class, 'updateprofile'])->name('profile.update');
            Route::put('/setting/user-reset/{user}', [UserController::class, 'updatepassword'])->name('user.reset');
            Route::put('/photo/delete-user-profile/{id}', [UserController::class, 'deletephoto'])->name('delete-photo-user');

        //Information
            //Activity
            Route::resource('/information/activity', ActivityController::class);

        //Table
            //Setting
            Route::get('/setting/role-data', [DataController::class, 'team'])->name('role.data');
            Route::get('/setting/user-data', [DataController::class, 'user'])->name('user.data');
            //Information
            Route::get('/information/activity-data', [DataController::class, 'activity'])->name('activity.data');
    });

});
