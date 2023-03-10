<?php
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('home');
        Route::get('/locale/{locale}', 'language')->name('language')->where('locale', '[a-z]+');
    });

Route::controller(ProductController::class)
    ->group(function () {
        Route::get('product/index', 'index')->name('index');
        Route::get('product/create/{id}', 'create')->name('product.create')->where('id', '[0-9]+');
        Route::get('product/destroy/{id}', 'destroy')->name('product.destroy')->where('id', '[0-9]+');
        Route::get('product/update/{id}', 'update')->name('product.update')->where('id', '[0-9]+');
        Route::get('product/show/{slug}', 'show')->name('product.show')->where('slug', '[A-Za-z0-9-]+');
        Route::get('/product/{slug}', 'product')->name('product')->where('slug', '[A-Za-z0-9-]+');
        Route::get('/category/{slug}', 'category')->name('category')->where('slug', '[A-Za-z0-9-]+');
        Route::get('/location/{id}', 'location')->name('location')->where('id', '[0-9-]+');
        Route::get('/brand/{slug}', 'brand')->name('brand')->where('slug', '[A-Za-z0-9-]+');
    });

Route::controller(VerificationController::class)
    ->middleware(['guest:customer_web', 'throttle:3,1'])
    ->group(function () {
        Route::get('/verification', 'create')->name('verification');
        Route::post('/verification', 'store');
    });

Route::controller(LoginController::class)
    ->middleware('guest:customer_web')
    ->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store');
    });

Route::controller(LoginController::class)
    ->middleware('auth:customer_web')
    ->group(function () {
        Route::post('/logout', 'destroy')->name('logout');
    });