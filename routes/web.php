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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => true, 'verify' => false, 'reset' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/{id}/{slug}', [ProductController::class, 'get'])->name('product');
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');

Route::group(['prefix' => 'user', 'as' => 'user.'], function ()
{
    Route::get('home', []);
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function ()
{
    Route::get('/', [Admin\HomeController::class, 'home']);

    Route::group([], function(){
        Route::get('login', [Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [Admin\Auth\LoginController::class, 'login']);
        Route::post('logout', [Admin\Auth\LoginController::class, 'logout'])->name('logout');
        Route::get('password/confirm', [Admin\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
        Route::post('password/confirm', [Admin\Auth\ConfirmPasswordController::class, 'confirm']);
        Route::get('password/reset', [Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('password/email', [Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
        Route::get('password/reset/{token}', [Admin\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('password/reset', [Admin\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
    });

	Route::group(['middleware' => ['auth:admin', 'check.admin']], function (){
        Route::get('dashboard', [Admin\HomeController::class, 'index'])->name('home');

        Route::get('customers/{filter}', [Admin\UsersController::class, 'index'])->name('users');
        Route::get('customer/{id}', [Admin\UsersController::class, 'get'])->name('user');

        Route::get('products/{filter}', [Admin\ProductController::class, 'index'])->name('products');
        Route::get('products_search', [Admin\ProductController::class, 'search'])->name('products.search');
        Route::get('products/{category}/{id}', [Admin\ProductController::class, 'filter'])->name('products.filter');
        Route::get('new-product', [Admin\ProductController::class, 'new'])->name('product.new');
        Route::post('new-product', [Admin\ProductController::class, 'saveNew'])->name('product.new.save');
        Route::get('product/{id}', [Admin\ProductController::class, 'get'])->name('product');
        Route::get('product/{id}/edit', [Admin\ProductController::class, 'edit'])->name('product.edit');
        Route::post('product/{id}/edit', [Admin\ProductController::class, 'update'])->name('product.update');

        Route::get('orders', [Admin\OrderController::class, 'index'])->name('orders');
        Route::get('order/{id}', [Admin\OrderController::class, 'get'])->name('order');

        Route::get('invoices', [Admin\InvoiceController::class, 'index'])->name('invoices');
        Route::get('invoice/{id}', [Admin\InvoiceController::class, 'get'])->name('invoice');

        Route::get('payments', [Admin\PaymentController::class, 'index'])->name('payments');
        Route::get('payment/{id}', [Admin\PaymentController::class, 'get'])->name('payment');

        Route::get('settings', [Admin\SettingsController::class, 'index'])->name('settings');
        Route::post('settings/new-product-category', [Admin\SettingsController::class, 'newProductCat'])->name('settings.newproductcat');
        Route::get('settings/new-admin', [Admin\SettingsController::class, 'newAdmin'])->name('settings.register');
        Route::post('settings/new-admin', [Admin\SettingsController::class, 'newAdmin']);
        Route::get('settings/admin/{id}/suspend', [Admin\SettingsController::class, 'suspendAdmin'])->name('suspend');
        Route::get('settings/admin/{id}/delete', [Admin\SettingsController::class, 'deleteAdmin'])->name('delete');
        Route::get('settings/profile', [Admin\ProfileController::class, 'index'])->name('profile');
        Route::put('settings/profile/edit', [Admin\SettingsController::class, 'update'])->name('profile.edit');
        Route::put('settings/profile/password', [Admin\SettingsController::class, 'password'])->name('profile.password');
	});
});
