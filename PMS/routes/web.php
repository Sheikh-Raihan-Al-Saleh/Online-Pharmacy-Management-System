<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminHomecontroller;
use App\Http\Controllers\customerHomeController;
use App\Http\Controllers\sellerHomeController;
use App\Http\Controllers\productController;
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

// Route::get('/home', function () {
//     return "{{route('home')}}";
// });
//Home
Route::get('/home',[HomeController::class,'home'])->name('home');
Route::get('/aboutus',[HomeController::class,'aboutus'])->name('aboutus');
//done by(Sheikh Raihan Al-Saleh)
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('/login',[HomeController::class,'loginSubmit'])->name('login');  
Route::get('/registration',[HomeController::class,'registration'])->name('registration');
Route::post('/registration',[HomeController::class,'regiSubmit'])->name('registration');
//Admin(Sheikh Raihan Al-Saleh)
Route::get('/admin/home',[adminHomecontroller::class,'home'])->name('admin.home');
Route::get('/admin/profile',[adminHomecontroller::class,'adminprofile'])->name('admin.profile');
Route::get('/admin/edit',[adminHomecontroller::class,'adminedit'])->name('admin.edit');
Route::post('/admin/edit',[adminHomecontroller::class,'editSubmit'])->name('admin.edit');
//admin_product
Route::get('/admin/Addproduct',[adminHomecontroller::class,'addproduct'])->name('admin.Addproduct');
Route::post('/admin/Addproduct',[adminHomecontroller::class,'productSub'])->name('admin.Addproduct');
Route::get('/admin/productlist',[adminHomecontroller::class,'list'])->name('admin.productlist');
Route::post('search',[adminHomeController::class,'search'])->name('search');

//Route::get('/admin/productlist', [productController::class,'search'])->name('admin.productlist');
//product edit
Route::get('/admin/editproduct/{p_id}',[productController::class,'productedit'])->name('admin.editproduct');
Route::post('/admin/editproduct',[productController::class,'producteditSubmit'])->name('admin.editproduct');
//product delete
Route::get('/admin/productlist/{p_id}',[productController::class,'delete'])->name('admin.productlist');
Route::post('/admin/productlist',[productController::class,'delete'])->name('admin.productlist');

//admin_customerlist
Route::get('/admin/customerlist',[adminHomecontroller::class,'clist'])->name('admin.customerlist');
Route::get('/admin/customerlist/{c_id}',[adminHomecontroller::class,'cdelete'])->name('admin.customerlist');
Route::post('/admin/customerlist',[adminHomecontroller::class,'cdelete'])->name('admin.customerlist');
//admin_sellerlist
Route::get('/admin/sellerlist',[adminHomecontroller::class,'slist'])->name('admin.sellerlist');
Route::get('/admin/sellerlist/{s_id}',[adminHomecontroller::class,'sdelete'])->name('admin.sellerlist');
Route::post('/admin/sellerlist',[adminHomecontroller::class,'sdelete'])->name('admin.sellerlist');
Route::get('/admin/editseller/{s_id}',[adminHomecontroller::class,'selleredit'])->name('admin.editseller');
Route::post('/admin/editseller',[adminHomecontroller::class,'sellereditSubmit'])->name('admin.editseller');
//admin_selllist
Route::get('/admin/productsells',[adminHomecontroller::class,'selllist'])->name('admin.productsells');
Route::get('/admin/productsells/{p_id}',[adminHomeController::class,'delete'])->name('admin.productsells');
Route::post('/admin/productsells',[adminHomeController::class,'delete'])->name('admin.productsells');

//customer(Jadid Rahman)
Route::get('/customer/home',[customerHomeController::class,'c_home'])->name('customer.home');
Route::get('/customer/profile',[customerHomeController::class,'customerprofile'])->name('customer.cprofile');
Route::get('/customer/productlist',[customerHomeController::class,'list'])->name('customer.productlist');
Route::get('/customer/edit',[customerHomeController::class,'customeredit'])->name('customer.edit');
Route::post('/customer/edit',[customerHomeController::class,'editSubmit'])->name('customer.edit');
Route::post('/addtocart',[customerHomeController::class,'Addtocart'])->name('addtocart');
Route::get('/customer/cart',[customerHomeController::class,'cart'])->name('customer.cart');
Route::get('/customer/cart/{p_id}',[customerHomeController::class,'cancel'])->name('customer.cart');
Route::post('/customer/cart',[customerHomeController::class,'cancel'])->name('customer.cart');
Route::post('/customer/payment',[customerHomeController::class,'payment'])->name('customer.payment');
Route::get('/customer/payment',[customerHomeController::class,'payment'])->name('customer.payment');
Route::post('/order',[customerHomeController::class,'order'])->name('order');

// Route::get('/customer/orderplace',[customerHomeController::class,'order'])->name('customer.orderplace');
// Route::get('/customer/cart/{p_id}',[customerHomeController::class,'Ordercancel'])->name('customer.cart');
// Route::post('/customer/cart',[customerHomeController::class,'Ordercancel'])->name('customer.cart');




//seller(Ridwan Rahat)
Route::get('/seller/home',[sellerHomeController::class,'s_home'])->name('seller.home');
Route::get('/seller/sprofile',[sellerHomeController::class,'sellerprofile'])->name('seller.sprofile');
Route::get('/seller/edit',[sellerHomeController::class,'selleredit'])->name('seller.edit');
Route::post('/seller/edit',[sellerHomeController::class,'editSubmit'])->name('seller.edit');
Route::get('/seller/productlist',[sellerHomeController::class,'list'])->name('seller.productlist');
Route::get('/seller/editproduct/{p_id}',[sellerHomeController::class,'productedit'])->name('seller.editproduct');
Route::post('/seller/editproduct',[sellerHomeController::class,'producteditSubmit'])->name('seller.editproduct');
Route::get('/seller/order',[sellerHomeController::class,'getorder'])->name('seller.order');
Route::post('/sells',[sellerHomeController::class,'sells'])->name('sells');

//logout
Route::get('/logout', [HomeController::class, 'logout'])->name('all.logout');