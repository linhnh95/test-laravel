<?php

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

Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create']);
    Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])->name('post.login');
});


Route::get('/', function () {
    return redirect('/products');
});
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'show']);


Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('post.logout');

    Route::get('/manage', [\App\Http\Controllers\ProductController::class, 'manage']);
    Route::get('/manage/create', [\App\Http\Controllers\ProductController::class, 'create']);
    Route::post('/manage/create', [\App\Http\Controllers\ProductController::class, 'store'])->name('create.product');
    Route::get('/manage/update/{id}', [\App\Http\Controllers\ProductController::class, 'edit']);
    Route::post('/manage/update/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('update.product');
    Route::get('/manage/delete/{id}', [\App\Http\Controllers\ProductController::class, 'delete'])->name('delete.product');
});
