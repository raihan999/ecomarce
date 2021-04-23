<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['prefix' => 'admin','middleware'=>['admin','auth'],'namespace'=>'admin'], function() {
    Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.deshboard');

    //Category Route here

    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
    Route::post('store/category', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store.category');

    //subcategory Route here 
    Route::get('subcategory', [App\Http\Controllers\Admin\SubcategoryController::class, 'index'])->name('subcategory');
    Route::post('store/subcategory', [App\Http\Controllers\Admin\SubcategoryController::class, 'store'])->name('store.subcategory');
    // brand Route here 
    
    Route::get('brand', [App\Http\Controllers\Admin\BrandController::class, 'index'])->name('brand');
    Route::post('store/brand', [App\Http\Controllers\Admin\BrandController::class, 'store'])->name('store.brand');

    //coupone route 
    Route::get('coupon', [App\Http\Controllers\Admin\CouponController::class, 'index'])->name('coupon');
    Route::post('store/coupon', [App\Http\Controllers\Admin\CouponController::class, 'store'])->name('store.coupon');


    //newslater
    Route::get('newslater', [App\Http\Controllers\Admin\CouponController::class, 'newslater'])->name('newslater');
    Route::post('store/newslater', [App\Http\Controllers\User\NewslaterController::class, 'storenewslater'])->name('newslater.store');
    

    //product route here 
    Route::get('product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product');
    Route::post('store/product', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store.product');
    Route::get('get/subcategory/{category_id}', [App\Http\Controllers\Admin\ProductController::class, 'getsubcategory']);

    // setting route here 
    
    Route::get('setting/', [App\Http\Controllers\Admin\SettingController::class, 'setting'])->name('setting');
 
});
// category edit delete Update route here 
Route::get('admin/edit/categoty/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit.categoty');
Route::post('admin/update/category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
Route::get('admin/delete/categoty/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);

//settings update route here 
Route::post('admin/update/settings/{id}', [App\Http\Controllers\Admin\SettingController::class, 'updatesetting']);
// brand edit delete 
Route::get('admin/delete/brand/{id}', [App\Http\Controllers\Admin\BrandController::class, 'delete']);
// newslater delete 

Route::get('admin/delete/newslater/{id}', [App\Http\Controllers\Admin\CouponController::class, 'deletenewslater']);
Route::get('/registers', [App\Http\Controllers\User\FrontendController::class, 'register'])->name('register.open');
Route::get('user/logout', [App\Http\Controllers\User\FrontendController::class, 'logout'])->name('user.logout');


//wishlists

Route::get('add/wishlist/{id}', [App\Http\Controllers\User\WishlistController::class, 'AddWishlist']);
Route::get('user/wishlist/', [App\Http\Controllers\User\CartController::class, 'Wishlist'])->name('user.wishlist');


//cart

Route::get('add/to/cart/{id}', [App\Http\Controllers\User\CartController::class, 'AddCart']);
Route::get('product/cart/', [App\Http\Controllers\User\CartController::class, 'showCart'])->name('show.cart');
Route::get('remove/cart/{rowId}', [App\Http\Controllers\User\CartController::class, 'removeCart']);
Route::post('update/cart/item', [App\Http\Controllers\User\CartController::class, 'UpdateCart'])->name('update.cartitem');
Route::get('user/checkout/', [App\Http\Controllers\User\CartController::class, 'Checkout'])->name('user.checkout');
Route::post('user/apply/coupon/', [App\Http\Controllers\User\CartController::class, 'Coupon'])->name('apply.coupon');
Route::get('coupon/remove/', [App\Http\Controllers\User\CartController::class, 'CouponRemove'])->name('coupon.remove');




 Route::post('/cart/product/add/{id}', [App\Http\Controllers\User\FrontendController::class,'AddCart']);

//product show with category route here 

 Route::get('/products/{id}', [App\Http\Controllers\User\FrontendController::class, 'productsView']);


//product detail route here 
//Route::get('/product/details/{id}/{product_name}', 'ProductController@ProductView');
Route::get('/product/details/{id}/{product_name}', [App\Http\Controllers\User\FrontendController::class, 'ProductView']);
Route::get('/product/popup/{id}/{product_name}', [App\Http\Controllers\User\FrontendController::class, 'quickview']);


Route::group(['prefix' => 'user','middleware'=>['user','auth'],'namespace'=>'user'], function() {
    Route::get('dashboard',[App\Http\Controllers\User\UserController::class, 'index'])->name('user.deshboard');
    Route::get('/profile',[App\Http\Controllers\User\FrontendController::class, 'profile'])->name('profile');

});

