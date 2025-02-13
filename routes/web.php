<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;





Route::get('/', [HomeController::class,'home'])->name('home.dashboard');
Route::get('/articlePage/{id}', [HomeController::class, 'articlePage'])->name('showArticlePage');

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
    //tag
    Route::get('tag',[TagController::class,'index'])->name('tag.index');
    Route::get('tag/createPage',[TagController::class,'createPage'])->name('tag.createPage');
    Route::post('tag-create',[TagController::class,'create'])->name('tag.create');
    Route::get('tag-editPage/{id}',[TagController::class,'editPage'])->name('tag.editPage');
    Route::post('tag-update/{id}',[TagController::class,'update'])->name('tag.update');
    Route::get('tag-delete/{id}',[TagController::class,'delete'])->name('tag.delete');
    //article   
    Route::get('article',[ArticleController::class,'index'])->name('article.index');
    Route::get('article/createPage',[ArticleController::class,'createPage'])->name('article.createPage');
    Route::post('article-create',[ArticleController::class,'create'])->name('article.create');
    Route::get('article-editPage/{id}',[ArticleController::class,'editPage'])->name('article.editPage');
    Route::post('article-update/{id}',[ArticleController::class,'update'])->name('article.update');
    Route::get('article-delete/{id}',[ArticleController::class,'delete'])->name('article.delete');


});
