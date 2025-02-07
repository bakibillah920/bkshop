<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopOneController;
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

Route::get('/', [ShopOneController::class, 'index'])->name('shop_one.root_route');


Route::group(['middleware' => ['auth']], function () {

    // Admin home
    Route::get('/admin/dashboard', [HomeController::class, 'home'])->name('admin');
    
    Route::group(['as' => 'merchant.', 'prefix' => 'merchant'], function () {
        Route::get('/dashboard', [HomeController::class, 'mdashbord'])->name('admin');
        
        Route::get('/store-index', [StoreController::class, 'index'])->name('store.index');
        Route::get('/create-store', [StoreController::class, 'create'])->name('store.create');
        Route::post('/store-store', [StoreController::class, 'store'])->name('store.store');
        Route::get('/store-edit/{id}', [StoreController::class, 'edit'])->name('store.edit');
        Route::patch('/store-update/{id}', [StoreController::class, 'update'])->name('store.update');
        Route::get('/store-delete/{id}', [StoreController::class, 'destroy'])->name('store.destroy');
        

        Route::get('/category-index', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create-category', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::patch('/category-update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/category-delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        
        Route::get('/product-index', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create-product', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product-store', [ProductController::class, 'store'])->name('product.store');
        Route::post('/product-get-category', [ProductController::class, 'getCategory'])->name('product.get.category');
        Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::patch('/product-update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/product-delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        
    });
    
    //optimize clear
    Route::get('/optimize-clear', [SettingController::class, 'optimizeClear'])->name('optimize-clear');
    Route::get('/optimize', [SettingController::class, 'optimize'])->name('optimize');
});
require __DIR__ . '/auth.php';
