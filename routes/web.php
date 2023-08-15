<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\UserController;

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
    return redirect('/user/login');
});

/* User */
Route::prefix('user')->group(function () {
    /* For Login */
    Route::get('login', [LoginController::class, 'indexLogin'])->name('login');
    Route::post('check-login', [LoginController::class, 'login']);

    /* For Registration */
    Route::get('registration', [LoginController::class, 'registration']);
    Route::post('registration-info', [LoginController::class, 'storeUserInfo']);

    Route::group(['middleware' => 'UserLogin'], function () {
        Route::get('logout', [LoginController::class, 'logout']);
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        /* User */
        Route::get('all-user', [UserController::class, 'allUser'])->name('getAllUser');
        Route::get('create-user', [UserController::class, 'createUser'])->name('getCreateUser');
        Route::post('store-user', [UserController::class, 'storeUser'])->name('getStoreUser');
        Route::get('edit-user-info/{id}', [UserController::class, 'editUser'])->name('getEditUser');
        Route::post('update-user-info', [UserController::class, 'updateUser'])->name('getUpdateUser');
        Route::get('change-user-password/{id}', [UserController::class, 'changePassword'])->name('getChangePassword');
        Route::post('update-user-password', [UserController::class, 'updatePassword'])->name('getUpdatePassword');

        Route::get('delete-user-info', [UserController::class, 'deleteUser'])->name('getDeleteUser');
    });
});
