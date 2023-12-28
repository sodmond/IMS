<?php

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

use App\Http\Controllers\Admin as Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => true, 'verify' => false, 'reset' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function ()
{
    Route::get('/', [Admin\HomeController::class, 'home']);

    Route::group([], function(){
        Route::get('login', [Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [Admin\Auth\LoginController::class, 'login']);
        Route::get('logout', [Admin\Auth\LoginController::class, 'logout'])->name('logout');
        Route::get('password/confirm', [Admin\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
        Route::post('password/confirm', [Admin\Auth\ConfirmPasswordController::class, 'confirm']);
        Route::get('password/reset', [Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('password/email', [Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
        Route::get('password/reset/{token}', [Admin\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('password/reset', [Admin\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
    });

	Route::group(['middleware' => ['auth:admin', 'check.admin']], function (){
        Route::get('dashboard', [Admin\HomeController::class, 'index'])->name('home');

        Route::get('customers', [Admin\UsersController::class, 'index'])->name('users');
        Route::get('customers/{search}', [Admin\UsersController::class, 'index'])->name('users.search');
        Route::get('customer/{id}', [Admin\UsersController::class, 'get'])->name('user');

        Route::get('products', [Admin\ProductController::class, 'index'])->name('products');
        Route::get('products/{search}', [Admin\ProductController::class, 'search'])->name('products.search');
        Route::get('product/{id}', [Admin\ProductController::class, 'get'])->name('product');

        Route::get('orders', [Admin\OrderController::class, 'index'])->name('orders');
        Route::get('orders/{search}', [Admin\OrderController::class, 'search'])->name('orders.search');
        Route::get('order/{id}', [Admin\OrderController::class, 'get'])->name('order');

        Route::get('invoices', [Admin\InvoiceController::class, 'index'])->name('invoices');
        Route::get('invoice/{id}', [Admin\InvoiceController::class, 'get'])->name('invoice');

        Route::get('payments', [Admin\PaymentController::class, 'index'])->name('payments');
        Route::get('payment/{id}', [Admin\PaymentController::class, 'get'])->name('payment');

        Route::get('settings', [Admin\SettingsController::class, 'index'])->name('settings');
	});
});
