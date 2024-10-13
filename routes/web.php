<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\FlashsaleController;


// Guest Routes
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/post-register', [AuthController::class, 'post_register'])->name('post.register');

    Route::post('/post-login', [AuthController::class, 'login']);
})->middleware('guest');

// Admin Routes
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/admin/product.detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    //Product Route
    Route::get('/product', [ProductController::class, 'index'])->name('admin.product');
    
    //Distributor Route
    Route::get('/distributor', [DistributorController::class, 'index'])->name('admin.distributor');
    Route::get('/distributor/create', [DistributorController::class, 'create'])->name('distributor.create'); 
    Route::post('/distributor/store', [DistributorController::class, 'store'])->name('distributor.store');
    Route::get('/distributor/edit/{distributor}', [DistributorController::class, 'edit'])->name('distributor.edit');
    Route::put('/distributor/update/{distributor}', [DistributorController::class, 'update'])->name('distributor.update');
    Route::delete('/distributor/destroy/{distributor}', [DistributorController::class, 'destroy'])->name('distributor.destroy');
    Route::delete('/distributor/delete/{id}', [DistributorController::class, 'delete'])->name('distributor.delete');

    //Flashsale Route
    Route::get('/flashsale', [FlashsaleController::class, 'index'])->name('admin.flashsale');
    Route::get('/fllashsale/create', [FlashsaleController::class, 'create'])->name('flashsale.create');
    Route::post('/flashsale/store', [FlashsaleController::class, 'store'])->name('flashsale.store');
    Route::get('/admin/flashsale/detail/{id}', [FlashsaleController::class, 'detail'])->name('flashsale.detail');
    Route::get('/flashsale/edit/{id}', [FlashsaleController::class, 'edit'])->name('flashsale.edit');
    Route::post('/flashsale/update/{id}', [FlashsaleController::class, 'update'])->name('flashsale.update');
    Route::delete('/flashsale/delete/{id}', [FlashsaleController::class, 'delete'])->name('flashsale.delete');
    
    

    Route::get('/admin-logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
})->middleware('admin');

// User Routes
Route::group(['middleware' => 'web'], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user/product/detail/{id}', [UserController::class, 'detail_product'])->name('user.detail.product');
    Route::get('/product/purchase/{productId}/{userId}', [UserController::class, 'purchase']);
    Route::get('/user/flashsale/detail/{id}', [UserController::class, 'detail_flashsale'])->name('user.detailf.flashsale');
    Route::get('/flashsale/purchase/{flashsaleId}/{userId}', [UserController::class, 'purchase']);
    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');
})->middleware('web');