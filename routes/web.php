<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('index');
});
*/

Route::get('/', [IndexController::class, 'index']);
Route::get('/more/{news}', [IndexController::class, 'more']);
Route::get('/category/{id}', [IndexController::class, 'category']);
Route::get('/login', [IndexController::class, 'login']);
Route::post('/login_check', [IndexController::class, 'login_check']);
Route::post('/search', [IndexController::class, 'search']);
//Route::post('/search', 'IndexController@search');

/*
Route::get('/login', function () {
    return view('login');
});
*/




Route::get('/admin/news/add', [NewsController::class, 'add_news_form']);
Route::post('/admin/news/add_check', [NewsController::class, 'add_news_check']);
Route::get('/admin/news/show', [NewsController::class, 'show_news']);
Route::get('/admin/news/delete/{id}', [NewsController::class, 'delete_news']);
Route::get('/admin/news/update/{news}', [NewsController::class, 'update_news_form']);
Route::post('/admin/news/update_check/{news}', [NewsController::class, 'update_news_check']);



// Category Routing
Route::get('/admin/category/add', [CategoryController::class, 'add_category_form']);
Route::post('/admin/category/add_check', [CategoryController::class, 'add_category_check']);
Route::get('/admin/category/show', [CategoryController::class, 'show_categories']);
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete_category']);
Route::get('/admin/category/update/{category}', [CategoryController::class, 'update_category_form']);
Route::post('/admin/category/update_check/{category}', [CategoryController::class, 'update_category_check']);


// Profile
Route::get('/admin/account', [AdminController::class, 'update_account_form']);
Route::post('/admin/account/update_check/{admin}', [AdminController::class, 'update_account_check']);
Route::get('/admin/panel', [AdminController::class, 'panel']);
Route::get('/exit', [AdminController::class, 'exit']);
