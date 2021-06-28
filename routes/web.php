<?php

use App\Http\Livewire\Admin\AddNewCategoryComponent;
use App\Http\Livewire\Admin\AddNewProductComponent;
use App\Http\Livewire\Admin\AdminAddCouponsComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCouponsComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\CategoryComponent;
use App\Http\Livewire\Admin\EditCategoryComponent;
use App\Http\Livewire\Admin\EditProductComponent;
use App\Http\Livewire\Admin\ProductComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryProductComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ProductDetailsComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\WishlistComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', HomeComponent::class);
Route::get('/shop', ShopComponent::class);
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}', ProductDetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}', CategoryProductComponent::class)->name('product.category');
Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');
Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');




// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::middleware(['auth:sanctum', 'verified', 'admin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/category', CategoryComponent::class)->name('admin.category');
    Route::get('/admin/category/add', AddNewCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}', EditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/product', ProductComponent::class)->name('admin.product');
    Route::get('/admin/product/add', AddNewProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}', EditProductComponent::class)->name('admin.editproduct');
    Route::get('/admin/home-categories', AdminCategoryComponent::class)->name('admin.home-categories');
    Route::get('/admin/coupons', AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupons/add', AdminAddCouponsComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupons/edit/{coupon_id}', AdminEditCouponsComponent::class)->name('admin.editcoupon');
    Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/orders/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

