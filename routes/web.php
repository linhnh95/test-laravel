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
Route::get('/', function () {
    return redirect('/manage');
});
Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/manage', [\App\Http\Controllers\ProductController::class, 'manage']);
Route::get('/manage/create', [\App\Http\Controllers\ProductController::class, 'create']);
