<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SalesController;
use App\Http\Controllers\admin\UserController;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {


    /* ADMİN */
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    /* END-ADMİN */


    /* LOGIN */
    Route::get('login', function () {
        return view('admin.login');
    })->name('admin.login');
    /* END-LOGIN */


    /* CATEGORY */
    Route::prefix('category')->group(function () {

        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('index', [CategoryController::class, 'index'])->name('admin.category.list');
        Route::get('create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::any('edit/{id?}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::any('update/{id?}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::any('store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::any('delete/{id?}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
    });
    /* END-CATEGORY */


    /* PRODUCT */
    Route::prefix('product')->group(function () {

        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('index', [ProductController::class, 'index'])->name('admin.product.list');
        Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::any('edit/{id?}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::any('update/{id?}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::any('store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::any('delete/{id?}', [ProductController::class, 'destroy'])->name('admin.product.delete');
    });
    /* END-PRODUCT */


    /* SALES */
    Route::prefix('sales')->group(function () {

        Route::get('/', [SalesController::class, 'index'])->name('admin.sales.index');
        Route::get('index', [SalesController::class, 'index'])->name('admin.sales.list');
        Route::any('show/{id?}', [SalesController::class, 'show'])->name('admin.sales.show');
    });
    /* END-SALES */


    /* USER */
    Route::prefix('user')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('index', [UserController::class, 'index'])->name('admin.user.list');
        Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
        Route::any('edit/{id?}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::any('update/{id?}', [UserController::class, 'update'])->name('admin.user.update');
        Route::any('store', [UserController::class, 'store'])->name('admin.user.store');
        Route::any('delete/{id?}', [UserController::class, 'destroy'])->name('admin.user.delete');
    });
    /* END-USER */
});
