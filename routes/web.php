<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\WishlistController;
use App\Http\Controllers\Site\CustomerAuthController;
use App\Http\Controllers\Site\MainController;
use App\Http\Controllers\Site\ProductController;

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){
    Route::get('/',                    [MainController::class,  'index'])->name('home');
    Route::get('/product/{product}',            [ProductController::class, 'show'])->name('product.show');
    Route::get('/product/{product}/quick-view', [ProductController::class, 'quickView'])->name('product.quick-view');
    Route::get('/shop',                         [ProductController::class, 'shop'])->name('shop');

    // Customer Auth
    Route::post('/customer/register', [CustomerAuthController::class, 'register'])->name('customer.register');
    Route::post('/customer/login',    [CustomerAuthController::class, 'login'])->name('customer.login');
    Route::post('/customer/logout',   [CustomerAuthController::class, 'logout'])->name('customer.logout')->middleware('customer');

    // Cart (requires customer login)
    Route::middleware('customer')->group(function () {
        Route::get('/cart',                         [CartController::class, 'index'])->name('cart.index');
        Route::get('/cart/mini',                    [CartController::class, 'miniCart'])->name('cart.mini');
        Route::post('/cart/add',                    [CartController::class, 'add'])->name('cart.add');
        Route::patch('/cart/item/{item}',           [CartController::class, 'update'])->name('cart.update');
        Route::delete('/cart/item/{item}',          [CartController::class, 'remove'])->name('cart.remove');
        Route::delete('/cart',                      [CartController::class, 'clear'])->name('cart.clear');

        // Wishlist
        Route::get('/wishlist',                         [WishlistController::class, 'index'])->name('wishlist.index');
        Route::post('/wishlist/toggle',                 [WishlistController::class, 'toggle'])->name('wishlist.toggle');
        Route::delete('/wishlist/{wishlist}',           [WishlistController::class, 'remove'])->name('wishlist.remove');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/link-storage', function() {

    $exitCode = Artisan::call('storage:link');

    return 'done';

});
