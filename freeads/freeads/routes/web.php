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
    return view('welcome');
});

Route::get('/search', function () {
    return view('search');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('hi');
})->name('dashboard');

Route::get('/add-product',[ProductController::class,'addProduct']);

Route::post('/add-product',[ProductController::class,'storeProduct'])->name('product.store');

Route::get('/all-product',[ProductController::class,'products']);



Route::get('/edit-product/{id}',[ProductController::class,'editProduct']);

Route::post('/update-product',[ProductController::class,'updateProduct'])->name('product.update');

Route::get('/delete-product/{id}',[ProductController::class,'deleteProduct']);
