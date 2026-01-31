<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
Route::get('/admin/create', [ProductController::class, 'create']);
Route::post('/admin/create', [ProductController::class, 'store']);
Route::get('/admin/create', [CategoryController::class, 'index']);
Route::delete('/admin/delete/{id}',[ProductController::class,'destroy'])->name('products.destroy');
Route::get('/admin/update/{id}',[ProductController::class,'edit']);
Route::post('/admin/update/{id}',[ProductController::class,'update']);
