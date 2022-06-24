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
use App\Http\Controllers\Admin\SiteSetting\SiteSettingController;
use App\Http\Controllers\Admin\SiteSetting\DeliverSettingController;
use App\Http\Controllers\Admin\SiteSetting\TermsAndConditionsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ContactController;


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

//Contact
Route::resource('contacts',ContactController::class);

// Cart
Route::get('/cart/add/{id}/',[CartController::class,'addCart'])->name('add.cart');
Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::get('/update/{color}/{id}',[CartController::class,'updateColor'])->name('update.color');
Route::get('/updated/{size}/{id}',[CartController::class,'updateSize'])->name('update.size');
Route::get('/update-qty/{qty}/{id}',[CartController::class,'updateQty'])->name('update.qty');
Route::get('/product/card/destroy/{id}',[CartController::class,'cartDestroy'])->name('cart.destroy');

// Apply Coupon
Route::post('/apply/coupon',[CartController::class,"applyCoupon"])->name('apply.coupon');
Route::get('/remove/coupon',[CartController::class,'couponRemove'])->name('coupon.remove');

//CartCheckout
Route::get('/cart/checkout',[OrderController::class,'cartCheckout'])->name('cart.checkout');
Route::post('/delivery/method/charge',[OrderController::class,'deliveryMethod']);
Route::post('/payment/method',[OrderController::class,'paymentMethod']);
Route::get('/add/wishlist/{id}',[WishlistController::class,'add'])->name('add.wishlist');
Route::post('/comfirm/order',[OrderController::class,'confirmOrder'])->name('comfirm.order')->middleware('auth');

Route::get('/check',[CartController::class,'check']);

// Terms And Conditon Admin/siteseting/

Route::get('/terms',[TermsAndConditionsController::class,'terms'])->name('terms');
Route::get('/pravicy',[TermsAndConditionsController::class,'privacy'])->name('privacy');
Route::get('/return/policy',[TermsAndConditionsController::class,'retunPolicy'])->name('return.policy');

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

    Route::get('/images/destroy/{image}/',[ImageController::class,'destroy'])->name('images.destroy');
    Route::resource('images', ImageController::class)->except(['destroy','show']);

    Route::get('/products/destroy/{product}/',[ProductController::class,'destroy'])->name('products.destroy');
    Route::get('/products/status/{product}/',[ProductController::class,'status'])->name('products.status');
    Route::resource('products', ProductController::class)->except(['destroy','show']);

    Route::get('/setting/delivery/charge',[DeliverSettingController::class,'index'])->name('delivery_charge.index');
    Route::get('/setting/delivery/charge/create',[DeliverSettingController::class,'create'])->name('delivery_charge.create');
    Route::post('/setting/charge/store',[DeliveryCharge::class,'store'])->name('delivery_charge.store');
    Route::get('/setting/delivey/charge/edit/{id}',[DeliverSettingController::class,'edit'])->name('delivery_charge.edit');
    Route::put('/setting/delivery/charge/update/{delivery_charge}',[DeliverSettingController::class,'update'])->name('delivery_charge.update');
    Route::get('/setting/delivery/charge/delete/{id}',[DeliverSettingController::class,'destory'])->name('delivery_charge.destory');

    Route::get('/setting/site' ,[SiteSettingController::class,'setting'])->name('site.setting');
    Route::post('setting/create',[SiteSettingController::class,'settingStore'])->name('setting.store');
    Route::put('setting/update/{id}',[SiteSettingController::class,'settingUpdate'])->name('setting.update');

    Route::get('/setting/trems/and/conditions',[TermsAndConditionsController::class,'create'])->name('terms.and.conditons');
    Route::post('/setting/trems/and/conditions/store',[TermsAndConditionsController::class,'store'])->name('terms_and_condition.store');
    Route::put('/setting/trems/and/conditions/update/{id}',[TermsAndConditionsController::class,'update'])->name('terms_and_condition.update');
});
// Route::group([
//     'prefix'=> 'seller',
//     'namespace'=> "Seller",
//     'middleware'=> ['auth','seller']
// ]);