<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home.index');
});
// Route::get('/', function () {
//     return view('admin.dashboard');
// });

Route::get('login-page', [AuthController::class, 'showLoginPage'])->name('loginPage');
Route::get('register-page', [AuthController::class, 'showRegisterPage'])->name('registerPage');

Route::post('do-register', [AuthController::class, 'doRegister'])->name('doRegister');
Route::post('do-login', [AuthController::class, 'doLogin'])->name('doLogin');

Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');

    //category
    Route::get('category',[CategoryController::class,'index'])->name('category.index');
    Route::get('category/createPage',[CategoryController::class,'createPage'])->name('category.createPage');
    Route::post('category-create',[CategoryController::class,'create'])->name('category.create');
    Route::get('category-editPage/{id}',[CategoryController::class,'editPage'])->name('category.editPage');
    Route::post('category-update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('category-delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

});
