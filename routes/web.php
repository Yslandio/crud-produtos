<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return redirect()->route('show');
});

Route::get('/show', [ProductController::class, 'show'])->name('show');

Route::get('/create', [ProductController::class,'create' ])->name('create');

Route::get('/update', [ProductController::class,'update' ])->name('update');

Route::post('store', [ProductController::class, 'store'])->name('store');

Route::post('put', [ProductController::class, 'put'])->name('put');

Route::post('delete', [ProductController::class, 'delete'])->name('delete');
