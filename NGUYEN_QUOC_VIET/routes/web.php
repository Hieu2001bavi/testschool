<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;


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

Route::get('/', [categoryController::class, 'home']);
//add cate
Route::get('/category', [categoryController::class, 'category'])->name('category');
Route::post('/addCat', [categoryController::class, 'addCat'])->name('addCat');
//add pro
Route::get('/product', [productController::class, 'product'])->name('product');
Route::post('/addPro', [productController::class, 'addPro'])->name('addPro');
Route::get('/listPro', [productController::class, 'listPro'])->name('listPro');
//edit & delete
Route::get('/{id?}', [productController::class, 'edit'])->name('edit');
Route::put('/editPro/{id?}', [productController::class, 'editPro'])->name('editPro');
Route::get('/deletePro/{id?}', [productController::class, 'delete'])->name('delete');
