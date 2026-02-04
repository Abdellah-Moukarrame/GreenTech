<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginControler;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/create', [ProductController::class, 'create']);
    Route::post('/admin/create', [ProductController::class, 'store']);
    Route::get('/admin/create', [CategoryController::class, 'index']);
    Route::delete('/admin/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/admin/update/{id}', [ProductController::class, 'edit']);
    Route::post('/admin/update/{id}', [ProductController::class, 'update']);
});

Route::get('/auth/login',[LoginControler::class,'index'])->name('login.index');
Route::post('/auth/login',[LoginControler::class,'login'])->name('login.login');
Route::get('/auth/register', [RegisterController::class,'create'])->name('register.create');
Route::post('/auth/register', [RegisterController::class,'store'])->name('register.store');
Route::get('/client/dash', [ClientController::class, 'index'])->name('client');
