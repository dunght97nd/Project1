<?php

use App\Http\Controllers\Front;
use App\Http\Controllers\Dashboard;


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
Route::get('dashboard/login', [Dashboard\UserController::class, 'getLoginAdmin']);
Route::post('dashboard/login', [Dashboard\UserController::class, 'postLoginAdmin']);

Route::get('dashboard/logout', [Dashboard\UserController::class, 'getLogoutAdmin']);


Route::get('login', [Front\LoginController::class, 'getLogin']);
Route::post('login', [Front\LoginController::class, 'postLogin']);

Route::get('login/forgetPassword', [Front\LoginController::class, 'getForgetPassword']);
Route::post('login/forgetPassword', [Front\LoginController::class, 'postForgetPassword']);

Route::get('login/editForgetPassword', [Front\LoginController::class, 'getEditForgetPassword']);
Route::post('login/editForgetPassword', [Front\LoginController::class, 'postEditForgetPassword']);

Route::get('register', [Front\LoginController::class, 'getRegister']);
Route::post('register', [Front\LoginController::class, 'postRegister']);

Route::get('logout', [Front\LoginController::class, 'getLogout']);

Route::get('user', [Front\LoginController::class, 'getUser']);
Route::post('user', [Front\LoginController::class, 'postUser']);

Route::get('user/editPassword', [Front\LoginController::class, 'getEditPassword']);
Route::post('user/editPassword', [Front\LoginController::class, 'postEditPassword']);


//------------------------- Front Start----------------------------------
Route::get('/', [Front\HomeController::class,'index']);

Route::prefix('shop')->group(function(){

    Route::get('/product/{id}', [Front\ShopController::class,'show']);
    Route::post('/product/{id}', [Front\ShopController::class,'postComment']);
    
    Route::get('/',[Front\ShopController::class, 'index']);    

    Route::get('/{categoryName}', [Front\ShopController::class,'category']);

});


Route::prefix('cart')->group(function(){

    Route::get('add/{id}', [Front\CartController::class, 'add']);

    Route::get('/', [Front\CartController::class, 'index']);
    Route::post('/', [Front\CartController::class, 'addProduct']);


    Route::get('delete/{rowId}', [Front\CartController::class, 'delete']);

    Route::get('/destroy', [Front\CartController::class, 'destroy']);
    
    Route::get('update', [Front\CartController::class, 'update']);

    Route::get('/uncheck-coupon', [Front\CartController::class, 'uncheckCoupon']);
    Route::post('/check-coupon', [Front\CartController::class, 'checkCoupon']);

});


Route::prefix('checkout')->group(function(){
    Route::get('/', [Front\CheckOutController::class, 'index']);
    Route::post('/', [Front\CheckOutController::class, 'addOrder']);

    Route::get('result', [Front\CheckOutController::class, 'result']);

});
//------------------------- Front End----------------------------------

// 
// 
// 
// 
// 
//------------------------- Dashboard Start----------------------------------

// use App\Models\ProductComment;


// Route::get('/test', function(){
//     $productComment = ProductComment::find(1);
//     dd($productComment->user);
//     foreach($user->productComments as $comment){
//         echo $comment->messages."<br>";
//     }
// });

// Route::get('/admin', function(){
//     return view('dashboard.brands.danhsach');
// });

Route::prefix('dashboard')->middleware('adminLogin')->group(function(){
    Route::get('index', [Dashboard\DashboardController::class, 'getIndex']);

    Route::prefix('brand')->group(function(){

        Route::get('list', [Dashboard\BrandController::class, 'getList']);

        Route::get('edit/{id}', [Dashboard\BrandController::class, 'getEdit']);
        Route::post('edit/{id}', [Dashboard\BrandController::class, 'postEdit']);


        Route::get('add', [Dashboard\BrandController::class, 'getAdd']);
        Route::post('add', [Dashboard\BrandController::class, 'postAdd']);

        Route::get('delete/{id}', [Dashboard\BrandController::class, 'getDelete']);

    });

    Route::prefix('productCategory')->group(function(){
        
        Route::get('list', [Dashboard\ProductCategoryController::class, 'getList']);

        Route::get('edit/{id}', [Dashboard\ProductCategoryController::class, 'getEdit']);
        Route::post('edit/{id}', [Dashboard\ProductCategoryController::class, 'postEdit']);


        Route::get('add', [Dashboard\ProductCategoryController::class, 'getAdd']);
        Route::post('add', [Dashboard\ProductCategoryController::class, 'postAdd']);

        Route::get('delete/{id}', [Dashboard\ProductCategoryController::class, 'getDelete']);

    });

    Route::prefix('product')->group(function(){
        
        Route::get('list', [Dashboard\ProductController::class, 'getList']);

        Route::get('edit/{id}', [Dashboard\ProductController::class, 'getEdit']);
        Route::post('edit/{id}', [Dashboard\ProductController::class, 'postEdit']);


        Route::get('add', [Dashboard\ProductController::class, 'getAdd']);
        Route::post('add', [Dashboard\ProductController::class, 'postAdd']);

        Route::get('delete/{id}', [Dashboard\ProductController::class, 'getDelete']);

    });

    Route::prefix('productDetail')->group(function(){
        
        Route::get('list', [Dashboard\ProductDetailController::class, 'getList']);

        Route::get('edit/{id}', [Dashboard\ProductDetailController::class, 'getEdit']);
        Route::post('edit/{id}', [Dashboard\ProductDetailController::class, 'postEdit']);


        Route::get('add', [Dashboard\ProductDetailController::class, 'getAdd']);
        Route::post('add', [Dashboard\ProductDetailController::class, 'postAdd']);

        Route::get('delete/{id}', [Dashboard\ProductDetailController::class, 'getDelete']);

    });
    Route::prefix('productImage')->group(function(){
        
        Route::get('list', [Dashboard\ProductImageController::class, 'getList']);

        Route::get('edit/{id}', [Dashboard\ProductImageController::class, 'getEdit']);
        Route::post('edit/{id}', [Dashboard\ProductImageController::class, 'postEdit']);


        Route::get('add', [Dashboard\ProductImageController::class, 'getAdd']);
        Route::post('add', [Dashboard\ProductImageController::class, 'postAdd']);

        Route::get('delete/{id}', [Dashboard\ProductImageController::class, 'getDelete']);

    });

    Route::prefix('productComment')->group(function(){
        
        Route::get('delete/{id}/{idProduct}', [Dashboard\ProductCommentController::class, 'getDelete']);

    });

    Route::prefix('user')->group(function(){
        
        Route::get('list', [Dashboard\UserController::class, 'getList']);

        Route::get('edit/{id}', [Dashboard\UserController::class, 'getEdit']);
        Route::post('edit/{id}', [Dashboard\UserController::class, 'postEdit']);

        Route::get('add', [Dashboard\UserController::class, 'getAdd']);
        Route::post('add', [Dashboard\UserController::class, 'postAdd']);

        Route::get('delete/{id}', [Dashboard\UserController::class, 'getDelete']);

    });

    Route::prefix('order')->group(function(){
        
        Route::get('list', [Dashboard\OrderController::class, 'getList']);

        Route::get('edit/{id}', [Dashboard\OrderController::class, 'getEdit']);
        Route::post('edit/{id}', [Dashboard\OrderController::class, 'postEdit']);

        Route::get('addOrderDetail/{id}', [Dashboard\OrderController::class, 'getAddOrderDetail']);
        Route::post('addOrderDetail/{id}', [Dashboard\OrderController::class, 'postAddOrderDetail']);

        Route::get('print/{id}', [Dashboard\OrderController::class, 'getPrint']);

        Route::get('add', [Dashboard\OrderController::class, 'getAdd']);
        Route::post('add', [Dashboard\OrderController::class, 'postAdd']);

        Route::get('delete/{id}', [Dashboard\OrderController::class, 'getDelete']);

    });

    Route::prefix('orderDetail')->group(function(){
        
        Route::get('list', [Dashboard\OrderDetailController::class, 'getList']);

        Route::get('edit', [Dashboard\OrderDetailController::class, 'getEdit']);

        Route::get('add', [Dashboard\OrderDetailController::class, 'getAdd']);

    });

    Route::prefix('blog')->group(function(){
        
        Route::get('list', [Dashboard\BlogController::class, 'getList']);

        Route::get('edit', [Dashboard\BlogController::class, 'getEdit']);

        Route::get('add', [Dashboard\BlogController::class, 'getAdd']);

    });
    
});






//------------------------- Dashboard End----------------------------------
