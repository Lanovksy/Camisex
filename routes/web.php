<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CondomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'web'], function () {
    Auth::routes();
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/users', [UserController::class, 'get_users'])->middleware('auth');
    Route::get('/users', [UserController::class, 'get_users'])->middleware('auth');
    Route::get('/users', [UserController::class, 'get_users'])->middleware('auth');

    Route::get('/brand', [BrandController::class, 'view_brand'])->middleware('auth');
    Route::post('/brand/create', [BrandController::class, 'create_brand'])->middleware('auth');
    Route::get('/brands', [BrandController::class, 'get_brands'])->middleware('auth');
    Route::get('/brand/edit/{id}', [BrandController::class, 'get_edit_brand'])->middleware('auth');
    Route::post('/brand/update/{id}', [BrandController::class, 'update_brand'])->middleware('auth');
    Route::delete('/brand/delete/{id}', [BrandController::class, 'delete_brand'])->middleware('auth');

    Route::get('/condom', [CondomController::class, 'view_condom'])->middleware('auth');
    Route::post('/condom/create', [CondomController::class, 'create_condom'])->middleware('auth');
    Route::get('/condons', [CondomController::class, 'get_condons'])->middleware('auth');
    Route::get('/condom/edit/{id}', [CondomController::class, 'get_edit_condom'])->middleware('auth');
    Route::post('/condom/update/{id}', [CondomController::class, 'update_condom'])->middleware('auth');
    Route::delete('/condom/delete/{id}', [CondomController::class, 'delete_condom'])->middleware('auth');

    Route::post('/order/create/{id}', [OrderController::class, 'create_order'])->middleware('auth');
    Route::get('/orders', [OrderController::class, 'get_orders'])->middleware('auth');
    Route::get('/all_orders', [OrderController::class, 'get_admin_orders'])->middleware('auth');
    Route::get('/condom/edit/{id}', [CondomController::class, 'get_edit_condom'])->middleware('auth');
    Route::post('/condom/update/{id}', [CondomController::class, 'update_condom'])->middleware('auth');
    Route::delete('/condom/delete/{id}', [CondomController::class, 'delete_condom'])->middleware('auth');
});
