<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaguController;
use App\Http\Controllers\UserController;
use App\Models\User;
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


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::middleware('only_guest')->group(function(){
  Route::get('login', [AuthController::class, 'login'])->name('login');
  Route::post('login', [AuthController::class, 'authenticating'])->name('login');

  Route::get('daftar', [AuthController::class, 'daftar'])->name('daftar');
  Route::post('daftar-user', [AuthController::class, 'daftar_user'])->name('daftar-user');
});



Route::middleware('auth')->group(function(){
  Route::get('logout', [AuthController::class, 'logout'])->name('logout');

  Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('only_admin');
  Route::get('profile_admin', [DashboardController::class, 'profile_admin'])->name('profile_admin');
  Route::get('users', [DashboardController::class, 'users'])->name('users');
  Route::get('users_edit/{id}', [DashboardController::class, 'users_edit'])->name('users_edit');
  Route::put('users_update', [DashboardController::class, 'user_update'])->name('users_update');


  Route::get('categories', [CategoryController::class, 'categories'])->name('categories');



  Route::get('lagu', [LaguController::class, 'lagu_index'])->name('lagu');
  Route::get('lagu-add', [LaguController::class, 'lagu_add'])->name('lagu-add');
  Route::post('lagu-add', [LaguController::class, 'lagu_store'])->name('lagu-add');
  Route::get('lagu_edit/{id}', [LaguController::class, 'lagu_edit'])->name('lagu_edit');
  Route::put('lagu_edit', [LaguController::class, 'lagu_update'])->name('lagu_edit');
  Route::delete('lagu_delete/{id}', [LaguController::class, 'lagu_delete'])->name('lagu_delete');

  Route::get('profile', [UserController::class, 'index'])->name('profile');
});






