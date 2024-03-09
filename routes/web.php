<?php

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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [App\Http\Controllers\auth\AuthController::class, 'login_page'])->name('login-page');
    Route::post('/login/submit', [App\Http\Controllers\auth\AuthController::class, 'login'])->name('login');
});
Route::redirect('/', '/dashboard');

Route::get('/login', [App\Http\Controllers\auth\AuthController::class, 'login_page'])->name('login-page');
Route::post('/login/submit', [App\Http\Controllers\auth\AuthController::class, 'login'])->name('login');
Route::any('/logout', [App\Http\Controllers\auth\AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\admin\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::group(['prefix' => 'content'], function () {
        Route::get('/success-info', [App\Http\Controllers\admin\SuccessInfoController::class, 'index'])->name('content.success-info');
        Route::post('/success-info-submit', [App\Http\Controllers\admin\SuccessInfoController::class, 'submit'])->name('content.success-info.submit');
        Route::get('/app-images', [App\Http\Controllers\admin\AppImagesController::class, 'index'])->name('content.app-images');
    });
});


