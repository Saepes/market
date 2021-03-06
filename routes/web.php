<?php

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

// Route main page
Route::get('/', 'HomePageController@showIndex') -> name('home');
Route::get('/category', 'CategoryController@showCategory') -> name('category');
Route::get('/cart', 'CartController@showCart') -> name('cart');
Route::get('/category/{alias}', 'CategoryController@showCategoryAlias') -> name('category_name');
Route::get('/category/{category_id}/{product_id}', 'ProductController@showProduct');
Route::post('/add-to-cart', 'CartController@addToCart')->name('addToCart');
Route::post('/deleteCart', 'CartController@delete')->name('deleteCart');

// Route clear cache (config route)
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/clear', function() {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('optimize');
        return "Кэш очищен.";
    });
});

//Route admin page
Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/', 'Admin\HomeController@index');
    Route::resource('category', Admin\CategoryController::class);
    Route::resource('product', Admin\ProductController::class);
});
