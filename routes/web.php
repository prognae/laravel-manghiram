<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

//HOMEPAGE AND LOGIN ROUTES
Route::get('/', [LoginController::class, 'index']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/login', [LoginController::class, 'validateLogin']);

//ITEM ROUTES
Route::get('/items', [ItemController::class, 'allItems']);

Route::get('/items/{category}', [ItemController::class, 'categoryItemView']);

Route::get('/items/view/{itemId}', [ItemController::class, 'viewItem']);
