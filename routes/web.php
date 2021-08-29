<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/post', [PostController::class, 'index']);
Route::get('/add-post', [PostController::class, 'create']);
Route::post('/add-post', [PostController::class, 'store']);
Route::get('/edit-post/{post}', [PostController::class, 'edit']);
Route::post('/edit-post/{post}', [PostController::class, 'update']);
Route::get('/delete-post/{post}', [PostController::class, 'delete']);
Route::get('/search', [PostController::class, 'search']);
Route::get('/category/{post}', [PostController::class, 'getCategoryPost']);
Route::get('/detail/{post}', [PostController::class, 'getPostDetail']);


Route::get('/category', [CategoryController::class, 'index']);
Route::get('/add-category', [CategoryController::class, 'create']);
Route::post('/add-category', [CategoryController::class, 'store']);
Route::get('/edit-category/{category}', [CategoryController::class, 'edit']);
Route::post('/edit-category/{category}', [CategoryController::class, 'update']);
Route::get('/delete-category/{category}', [CategoryController::class, 'delete']);



Route::get('/', [HomeController::class, 'index']);
