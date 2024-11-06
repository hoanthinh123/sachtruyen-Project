<?php

use App\Http\Controllers\Admin\DanhmucTruyenController as AdminDanhmucTruyenController;
use App\Http\Controllers\Admin\TruyenController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DanhmucTruyenController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

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
//Admin
Route::middleware([Authenticate::class, CheckAuth::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [UserController::class, 'home'])->name('admin.users.home');
        //
        // users
        Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/create', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/edit/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        });
        //danh mục
        Route::prefix('/danhmuc')->group(function () {
            Route::get('/', [AdminDanhmucTruyenController::class, 'index'])->name('admin.danhmuc.index');
            Route::get('/create', [AdminDanhmucTruyenController::class, 'create'])->name('admin.danhmuc.create');
            Route::post('/create', [AdminDanhmucTruyenController::class, 'store'])->name('admin.danhmuc.store');
            Route::get('/edit/{user}', [AdminDanhmucTruyenController::class, 'edit'])->name('admin.danhmuc.edit');
            Route::put('/edit/{user}', [AdminDanhmucTruyenController::class, 'update'])->name('admin.danhmuc.update');
            Route::delete('/delete/{user}', [AdminDanhmucTruyenController::class, 'destroy'])->name('admin.danhmuc.destroy');
        });

        // truyện
        Route::resource('/truyen', TruyenController::class);
    });
});
//Login, register, logout
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::get('/register', [AuthController::class, 'getRegister'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');