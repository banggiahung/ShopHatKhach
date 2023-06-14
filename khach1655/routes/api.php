<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\OrdersProductController;
use Illuminate\Support\Facades\Storage;

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

//Products
Route::post('/products', [ProductsController::class, 'store']);
Route::get('/getProducts', [ProductsController::class, 'index']);
Route::get('/getProductsNew', [ProductsController::class, 'getNewindex']);
Route::get('/getProductsHotHit', [ProductsController::class, 'hotHit']);
Route::get('/getCount', [ProductsController::class, 'countIndex']);
Route::post('/productsEdit/{id}', [ProductsController::class, 'update']);
Route::get('/products/category/{categoryId}', [ProductsController::class, 'getProductsByCategoryId']);
Route::post('/products/search', [ProductsController::class, 'searchProducts']);
Route::get('/productsDetails/{id}', [ProductsController::class, 'getProductById']);
Route::delete('/products/{id}', [ProductsController::class, 'destroy']);
Route::post('/send-email', [ProductsController::class, 'sendEmail']);
Route::post('/send-email-admin', [ProductsController::class, 'sendEmailByAdmin']);

Route::middleware('cors')->get('/storage/images/{filename}', function ($filename) {
    return Storage::disk('public')->response("images/{$filename}");
});
//Category
Route::post('/category', [CategoryController::class, 'store']);
Route::get('/getCategory', [CategoryController::class, 'index']);
Route::post('/categoryEdit/{id}', [CategoryController::class, 'update']);
Route::get('/categoryGetId/{id}', [CategoryController::class, 'getCateById']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);


//UserLogin
Route::post('/login', [UserLoginController::class, 'login']);
Route::post('/register', [UserLoginController::class, 'register']);
Route::get('/getUserNameById', [UserLoginController::class, 'GetByIdName']);
Route::post('/getUserAdmin', [UserLoginController::class, 'getAllUsersWithAdmin']);
Route::get('/getAllFillById/{id}', [UserLoginController::class, 'GetAllIdName']);
Route::get('/checkLogin', [UserLoginController::class, 'checkLogin']);
Route::get('/getUserAllAuth', [UserLoginController::class, 'getAllUsers']);
Route::post('/logout', [UserLoginController::class, 'logout']);
Route::delete('/userDeleteId/{id}', [UserLoginController::class, 'destroy']);
Route::post('/users/{id}/email', [UserLoginController::class, 'updateEmail']);

    // Các route API khác...
    // Các route có sử dụng session id ở đây

    // ...

//Orders
Route::get('/getOrders/{id}', [OrdersProductController::class, 'index']);
Route::get('/getOrdersID/{id}', [OrdersProductController::class, 'indexTest']);
Route::get('/deleteCart/{productId}/{id}', [OrdersProductController::class, 'deleteCart']);
Route::get('/countGetOrders', [OrdersProductController::class, 'countStatusOrders']);
Route::get('/calculateTotal', [OrdersProductController::class, 'calculateTotalPayToday']);
Route::get('/calculateTotalPayThisWeek', [OrdersProductController::class, 'calculateTotalPayThisWeek']);
Route::get('/calculateTotalPayThisMonth', [OrdersProductController::class, 'calculateTotalPayThisMonth']);
Route::get('/calculateTotalPayEveryWeek', [OrdersProductController::class, 'calculateTotalPayEveryWeek']);
Route::get('/getAllOrdersAndUsers', [OrdersProductController::class, 'getAllOrdersAndUsers']);
Route::post('/ordersAdd', [OrdersProductController::class, 'createOrder']);
Route::post('/createOrderTest', [OrdersProductController::class, 'createOrderTest']);
Route::post('/addToCart', [OrdersProductController::class, 'addToCart']);
Route::post('/orderEdit/{id}', [OrdersProductController::class, 'updateCart']);
Route::post('/orders/{userId}/confirm', [OrdersProductController::class, 'confirmOrder']);
Route::post('/ordersDelete', [OrdersProductController::class, 'deleteOrder']);
Route::get('/confirmToSuccess/{id}', [OrdersProductController::class, 'confirmForAdmin']);
Route::get('/confirmToDestroy/{id}', [OrdersProductController::class, 'confirmForAdminDestroy']);
Route::get('/getToSuccess/{id}', [OrdersProductController::class, 'detailsWithAdmin']);

Route::get('/revenue-by-month', [OrdersProductController::class, 'getRevenueByMonth']);

