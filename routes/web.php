<?php

use App\Exports\ProductExport;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MAnagePersmessionController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsercrudController;
use App\Http\Controllers\UtilasateuresController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware(AdminMiddleware::class)->prefix('/admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin');
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/create', [ProductController::class, 'store']);
    Route::get('/create', [CategoryController::class, 'index']);
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/update/{id}', [ProductController::class, 'edit']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::get('/export_data',function(){
        return Excel::download(new ProductExport , 'products_data.xlsx');
    })->name('admin.export');
});

Route::get('/auth/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/auth/login', [LoginController::class, 'login'])->name('login.login');
Route::get('/auth/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/auth/register', [RegisterController::class, 'store'])->name('register.store');
Route::middleware(ClientMiddleware::class)->group(function () {
    Route::get('/client/dash', [ClientController::class, 'index'])->name('client');
    Route::get('/favorites', [FavoritesController::class, 'index'])->name('client.favorites');
    Route::post('/client/dash', [FavoritesController::class, 'create'])->name('create.favorites');
});

// Route::get('/client/allproducts', [ClientController::class, 'show']);
Route::get('/admin/manage_user',[ManageUserController::class,'index'])->name('users');
Route::get('/admin/manage_user/edit/{id}',[UtilasateuresController::class,'edit']);
Route::post('/admin/manage_user/edit/{id}',[UtilasateuresController::class,'update'])->name('user.update');
Route::delete('/admin/manage_user/delete/{id}',[UtilasateuresController::class,'destroy'])->name('users.delete');
Route::get('/admin/roles',[MAnagePersmessionController::class,'index']);
Route::get('/admin/create_user',[UtilasateuresController::class,'create']);
Route::post('/admin/create_user',[UtilasateuresController::class,'store']);

///Roles
Route::get('/admin/roles_permessions',[RoleController::class,'index'])->name('roles');
Route::get('/admin/roles_permessions/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
Route::post('/admin/roles_permessions/edit/{id}',[RoleController::class,'update'])->name('role.update');
Route::delete('/admin/roles_permessions/delete/{id}',[RoleController::class,'destroy'])->name('delete_role');
Route::get('/admin/roles_permessions/create',[RoleController::class,'create'])->name('role.create');
Route::post('/admin/roles_permessions/create',[RoleController::class,'store'])->name('role.store');
///logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
