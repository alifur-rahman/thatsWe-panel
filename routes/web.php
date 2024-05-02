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
        // success infomaton 
        Route::get('/success-info', [App\Http\Controllers\admin\SuccessInfoController::class, 'index'])->name('content.success-info');
        Route::post('/success-info-retrieve', [App\Http\Controllers\admin\SuccessInfoController::class, 'data_retrive'])->name('content.success-retrieve');
        Route::post('/success-info-submit', [App\Http\Controllers\admin\SuccessInfoController::class, 'submit'])->name('content.success-info.submit');
        Route::post('/success-info-update', [App\Http\Controllers\admin\SuccessInfoController::class, 'update'])->name('content.success-info.update');
        Route::post('/success-info-delete', [App\Http\Controllers\admin\SuccessInfoController::class, 'delete'])->name('content.success-info.delete');
        Route::post('/success-info-update-modal', [App\Http\Controllers\admin\SuccessInfoController::class, 'fetchUpdateModal'])->name('info_update.fetch');

        // app images 
        Route::get('/app-images', [App\Http\Controllers\admin\AppImagesController::class, 'index'])->name('content.app-images');
        Route::post('/app-images-retrieve', [App\Http\Controllers\admin\AppImagesController::class, 'data_retrive'])->name('content.app-image-retrieve');
        Route::post('/app-images-submit', [App\Http\Controllers\admin\AppImagesController::class, 'submit'])->name('content.app-images.add');
        Route::post('/app-images-update-modal', [App\Http\Controllers\admin\AppImagesController::class, 'fetchUpdateModal'])->name('image_update.fetch');
        Route::post('/app-images-delete', [App\Http\Controllers\admin\AppImagesController::class, 'delete'])->name('content.app-image.delete');
        Route::post('/app-images-update', [App\Http\Controllers\admin\AppImagesController::class, 'update'])->name('content.app-images.update');

        // order content 
        Route::group(['prefix' => 'order'], function () {
            Route::get('/text/show', [App\Http\Controllers\admin\OrderConentController::class, 'index'])->name('content.order.show');
            Route::post('/text/submit', [App\Http\Controllers\admin\OrderConentController::class, 'submit'])->name('content.order.submit');
            Route::get('/text/pdf', [App\Http\Controllers\admin\OrdePdfrConentController::class, 'index'])->name('content.order-pdf.show');
            Route::post('/text/pdf/submit', [App\Http\Controllers\admin\OrdePdfrConentController::class, 'submit'])->name('content.pdf.order.submit');
        });

        // policy content 
        Route::group(['prefix' => 'policy'], function () {
            Route::get('/show', [App\Http\Controllers\admin\PolicyConentController::class, 'index'])->name('content.policy.show');
            Route::post('/submit', [App\Http\Controllers\admin\PolicyConentController::class, 'submit'])->name('content.policy.submit');
        });
    });
    // Agency routes 
    Route::group(['prefix' => 'agency'], function () {
        Route::get('/show', [App\Http\Controllers\admin\AgencyController::class, 'index'])->name('agency.show');
        Route::post('/show/retrieve', [App\Http\Controllers\admin\AgencyController::class, 'data_retrive'])->name('agency.show.retrieve');
        Route::post('/add', [App\Http\Controllers\admin\AgencyController::class, 'submit'])->name('agency.submit');
        Route::post('/update', [App\Http\Controllers\admin\AgencyController::class, 'update'])->name('agency.update');
        Route::post('/delete', [App\Http\Controllers\admin\AgencyController::class, 'delete'])->name('agency.delete');
        Route::post('/update-modal', [App\Http\Controllers\admin\AgencyController::class, 'fetchUpdateModal'])->name('agency.update.fetch');
        Route::group(['prefix' => 'zip'], function () {
            Route::get('/show', [App\Http\Controllers\admin\AgencyZipController::class, 'index'])->name('agency.zip.show');
            Route::any('/show/retrieve', [App\Http\Controllers\admin\AgencyZipController::class, 'data_retrive'])->name('agency.zip.show.retrieve');
            Route::post('/add', [App\Http\Controllers\admin\AgencyZipController::class, 'submit'])->name('agency.zip.submit');
            Route::post('/update-modal', [App\Http\Controllers\admin\AgencyZipController::class, 'fetchUpdateModal'])->name('agency.zip.update.fetch');
            Route::post('/update', [App\Http\Controllers\admin\AgencyZipController::class, 'update'])->name('agency.zip.update');
            Route::post('/item/delete', [App\Http\Controllers\admin\AgencyZipController::class, 'delete'])->name('agency.zip.delete');
        });
    });

    // manage orders 
    Route::group(['prefix' => 'order'], function () {
        Route::get('/show', [App\Http\Controllers\admin\OrderController::class, 'index'])->name('order.show');
        Route::any('/show/retrieve', [App\Http\Controllers\admin\OrderController::class, 'data_retrive'])->name('order.show.retrieve');
        Route::any('/details/retrieve', [App\Http\Controllers\admin\OrderController::class, 'data_retrive_details'])->name('order.details.retrieve');
        Route::post('/item/delete', [App\Http\Controllers\admin\OrderController::class, 'delete'])->name('order.delete');
    });



});


