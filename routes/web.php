<?php

use Illuminate\Support\Facades\Route;
// Admin 
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\ChildcategoryController;
use App\Http\Controllers\Admin\Category\SubcategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;

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
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//User  
Route::get('/',[WelcomeController::class,'welcome'])->name('welcome.page');
Route::get('/product/{slug}',[WelcomeController::class,'product_show'])->name('product.show');

Route::get('/cart/add/{id}/',[CartController::class,'addCart'])->name('add.cart');
Route::get('/cart/checkout',[CartController::class,'cartCheckout'])->name('cart.checkout');
Route::post('/update/cart/{id}',[CartController::class,'updateCart'])->name('update.cart');
Route::get('/product/card/destroy/{id}',[CartController::class,'cartDestroy'])->name('cart.destroy');

Route::get('/add/wishlist/{id}',[WishlistController::class,'add'])->name('add.wishlist');


// Admin 
Route::group([
    'prefix'=> 'admin',
    'middleware'=> ['auth','admin']
],function(){
    Route::get('/dashboard',[AdminDashboardController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/categories/destroy/{category}/',[CategoryController::class,'destroy'])->name('categories.destroy');
    Route::resource('categories', CategoryController::class)->except(['destroy','show']);
    Route::get('/subcategories/destroy/{subcategory}/',[CategoryController::class,'destroy'])->name('subcategories.destroy');
    Route::resource('subcategories', SubcategoryController::class)->except(['destroy','show']);
    Route::get('/childcategories/destroy/{childcategory}/',[CategoryController::class,'destroy'])->name('childcategories.destroy');
    Route::resource('childcategories',ChildcategoryController::class)->except(['destroy','show']);

    Route::get('/sliders/status/{slider}/',[SliderController::class,'status'])->name('sliders.status');
    Route::get('/sliders/destroy/{slider}/',[SliderController::class,'destroy'])->name('sliders.destroy');
    Route::resource('sliders', SliderController::class)->except('destroy');

    Route::get('/brands/destroy/{brand}/',[BrandController::class,'destroy'])->name('brands.destroy');
    Route::resource('brands', BrandController::class)->except(['destroy','show']);

    Route::get('/coupons/status/{coupon}/',[CouponController::class,'status'])->name('coupons.status');
    Route::get('/coupons/destroy/{coupon}/',[CouponController::class,'destroy'])->name('coupons.destroy');
    Route::resource('coupons', CouponController::class)->except(['destroy','show']);

    Route::get('/tags/destroy/{tag}/',[TagController::class,'destroy'])->name('tags.destroy');
    Route::resource('tags', TagController::class)->except(['destroy','show']);

    Route::get('/images/destroy/{tag}/',[ImageController::class,'destroy'])->name('images.destroy');
    Route::resource('images', ImageController::class)->except(['destroy','show']);

    Route::get('/products/destroy/{product}/',[ProductController::class,'destroy'])->name('products.destroy');
    Route::get('/products/status/{product}/',[ProductController::class,'status'])->name('products.status');
    Route::resource('products', ProductController::class)->except(['destroy','show']);
});
// Route::group([
//     'prefix'=> 'seller',
//     'namespace'=> "Seller",
//     'middleware'=> ['auth','seller']
// ]);