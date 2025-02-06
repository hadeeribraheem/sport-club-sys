<?php

use App\Http\Controllers\Admin\AdminUserControllerResource;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\SportControllerResource;
use App\Http\Controllers\Admin\TeamControllerResource;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DeleteController;
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

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::resources([
            'users' => AdminUserControllerResource::class,
            'sports'=>SportControllerResource::class,
            'teams' => TeamControllerResource::class,
        ]);
        Route::get('/admin/notifications', [NotificationController::class, 'index'])->name('admin.notifications');
        Route::get('/admin/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('admin.notifications.read');
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
});
Route::get('/logout', [LogoutController::class, 'logout_system'])->name('logout');
Route::get('/delete-item', DeleteController::class)->name('delete.item');
