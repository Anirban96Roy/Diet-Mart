<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\OrderController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|


Route::get('/', function () {
    return view(Welcome);
});*/

Route::get('/',[FrontController::class,'index'])->name('front.diet');
Route::get('/show_cart',[FrontController::class,'show_cart'])->name('front.show_cart');
Route::get('/remove_cart/{id}',[FrontController::class,'remove_cart'])->name('front.removeCart');
Route::post('/add_cart/{id}',[FrontController::class,'add_cart'])->name('front.addCart'); 
Route::get('/cash_order',[FrontController::class,'cash_order'])->name('front.cash_order');
Route::get('/back',[FrontController::class,'back'])->name('front.back');
Route::post('/contact', [FrontController::class, 'submitContactForm'])->name('contact.submit');

Route::group(['prefix' => 'account'],function()
{
    Route::group(['middleware' => 'guest'],function()
    {
        Route::get('/login',[AuthController::class,'login'])->name('account.login');
        Route::post('/login',[AuthController::class,'authenticate'])->name('account.authenticate');
        Route::get('/register',[AuthController::class,'register'])->name('account.register');
        Route::post('/process-register',[AuthController::class,'processRegister'])->name('account.processRegister');


    });
    Route::group(['middleware' => 'auth'],function()
    {
        Route::get('/logout',[AuthController::class,'logout'])->name('account.logout');

    });
});

Route::group(['prefix' => 'admin'],function(){
    Route::group(['middleware' => 'admin.guest'],function()
    {
        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
       
       
    });
    Route::group(['middleware' => 'admin.auth'],function()
    { 
         

        Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');
        
       
        Route::get('/category',[CategoryController::class,'index'])->name('category.index');
        Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
        Route::post('/category',[CategoryController::class,'store'])->name('category.store');
        Route::get('/category/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');
        Route::put('/category/{category}',[CategoryController::class,'update'])->name('category.update');
        Route::delete('/category/{category}',[CategoryController::class,'destroy'])->name('category.delete');

        Route::get('/product/create',[ProductController::class,'create_product'])->name('product.create');
        Route::POST('/product',[ProductController::class,'store'])->name('product.store');
        Route::get('/product',[ProductController::class,'view_product'])->name('product.view');

        Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
        Route::post('/product/{product}',[ProductController::class,'update'])->name('product.update');
        Route::get('/product/{product}/delete',[ProductController::class,'delete'])->name('product.delete');

        Route::get('/order',[OrderController::class,'order'])->name('order.view');
        Route::get('/order/{id}',[OrderController::class,'delivered'])->name('order.delivered');

        Route::get('/getSlug',function(Request $request)
        {
            $slug='';
            if(!empty($request->title))
            {
                $slug=Str::slug($request->title);
            }
            return response()->json([
                'status'=>true,
                'slug'=>$slug

            ]);
        })->name('getSlug');

        
        

    });

});
