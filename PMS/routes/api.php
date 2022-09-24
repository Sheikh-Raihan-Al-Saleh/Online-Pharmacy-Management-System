<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerAPIControllers;
use App\Http\Controllers\AdminAPIController;
use App\Http\Controllers\SellerAPIControllers;
use App\Http\Controllers\ProductAPIControllers;
use App\Http\Controllers\SellsAPIControllers;
use App\Http\Controllers\CartAPIControllers;
use App\Http\Controllers\OrderAPIControllers;
use App\Http\Controllers\MAilAPIControllers;
use App\Http\Controllers\LoginAPIControllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Admin Api(Sheikh Raihan Al Saleh)
//Login
Route::post("/login",[LoginAPIControllers::class,'loginSubmit']);
Route::get("/login/get",[LoginAPIControllers::class,'login']);
//Route::get("/login/get",[LoginAPIControllers::class,'alogin']);
//Admin Table
Route::get("/Admin/get",[AdminAPIController::class,'getAdmin']);
Route::get("/Admin/get/{a_id}",[AdminAPIController::class,'getAdminid']);
Route::post("/Admin/add",[AdminAPIController::class,'addAdmin']);
Route::get("/Admin/delete/{a_id}",[AdminAPIController::class,'deleteAdmin']);
Route::post("/Admin/edit",[AdminAPIController::class,'editAdmin']);
//ProductTable
Route::get("/Product/get",[ProductAPIControllers::class,'getProductlist']);
Route::get("/Product/get/{p_id}",[ProductAPIControllers::class,'getProductid']);
Route::post("/Product/add",[ProductAPIControllers::class,'addProduct']);
Route::get("/Product/delete/{p_id}",[ProductAPIControllers::class,'deleteProduct']);
Route::post("/Product/edit",[ProductAPIControllers::class,'editProduct']);
//SellsTable
Route::get("/Sellproducts/get",[SellsAPIControllers::class,'getSellProductlist']);
Route::get("/SellProducts/get/{p_id}",[SellsAPIControllers::class,'getSellProductid']);
Route::get("/SellProducts/delete/{p_id}",[SellsAPIControllers::class,'delete']);
//Mailing test
Route::get("test",[MAilAPIControllers::class,'mail']);




//Customer APi (Jadid Rahman)
Route::get("/Customer/get",[CustomerAPIControllers::class,'getCustomer']);
Route::get("/Customer/get/{c_id}",[CustomerAPIControllers::class,'getCustomerid']);
Route::post("/Customer/add",[CustomerAPIControllers::class,'addCustomer']);
Route::get("/Customer/delete/{c_id}",[CustomerAPIControllers::class,'deleteCustomer']);
Route::post("/Customer/edit",[CustomerAPIControllers::class,'editCustomer']);
//Cart Table
Route::get("/Cart/get",[CartAPIControllers::class,'getCart']);
Route::post("/Cart/add",[CartAPIControllers::class,'addCart']);
Route::get("/Cart/delete/{p_id}",[CartAPIControllers::class,'deleteCart']);
Route::post("/Cart/edit",[CartAPIControllers::class,'editCart']);
//Order Table
Route::get("/Order/get",[OrderAPIControllers::class,'getOrder']);
Route::post("/Order/add",[OrderAPIControllers::class,'addOrder']);
Route::get("/Order/get/{c_id}",[OrderAPIControllers::class,'getOrderid']);
Route::get("/Order/delete/{c_id}",[OrderAPIControllers::class,'deleteOrder']);

//Route::get("mail",[MAilAPIControllers::class,'Customermail']);



//Seller APi (Ridwan mannan Rahat)
Route::get("/Seller/get",[SellerAPIControllers::class,'getSeller']);
Route::get("/Seller/get/{s_id}",[SellerAPIControllers::class,'getSellerid']);
Route::post("/Seller/add",[SellerAPIControllers::class,'addSeller']);
Route::get("/Seller/delete/{s_id}",[SellerAPIControllers::class,'deleteSeller']);
Route::post("/Seller/edit",[SellerAPIControllers::class,'editSeller']);

//Product table
Route::get("/seller/Product/get",[SellerAPIControllers::class,'getProductlist']);
Route::get("/seller/Product/get/{p_id}",[SellerAPIControllers::class,'getProductid']);
Route::post("/seller/Product/edit",[SellerAPIControllers::class,'editSellerProduct']);

//Order table
Route::get("/seller/order/get",[SellerAPIControllers::class,'getCustomerOrder']);
//sells table
Route::post("/seller/sellproduct/sell",[SellerAPIControllers::class,'addSellProduct']);
Route::get("/seller/Sellproducts/get",[SellerAPIControllers::class,'getSellProduct']);
Route::get("/seller/SellProducts/get/{p_id}",[SellerAPIControllers::class,'getSellsProductid']);



