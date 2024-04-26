<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
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
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'],function(){
    Route::group(['middleware' => 'admin.guest'],function()
    {
        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');

    });
    Route::group(['middleware' => 'admin.auth'],function()
    {
        Route::get('/category',[CategoryController::class,'index'])->name('category.index');
        Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');
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