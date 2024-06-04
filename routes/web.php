<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProspectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;



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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('customers', CustomerController::class);
Route::resource('products', ProductController::class);


Route::get('/prospects/all_credits', [ProspectController::class, 'all_credits']);
Route::get('/prospects/unpaid_credits', [ProspectController::class, 'unpaid_credits']);
Route::get('/prospects/onprogress_credits', [ProspectController::class, 'onprogress_credits']);
Route::get('/prospects/closed_credits', [ProspectController::class, 'closed_credits']);
Route::resource('prospects', ProspectController::class);


Route::get('/collection-form', [App\Http\Controllers\CollectionController::class, 'create'])->name('collection-form');
Route::post('/collection', [App\Http\Controllers\CollectionController::class, 'store'])->name('collection-save');
Route::get('/collections', [CollectionController::class, 'index'])->name('collections.index');
Route::get('/collections/create', [CollectionController::class, 'create'])->name('collections.create');
Route::post('/collections', [CollectionController::class, 'store'])->name('collections.store');
Route::get('/collections/{id}', [CollectionController::class, 'show'])->name('collections.show');
Route::get('/collections/{id}/edit', [CollectionController::class, 'edit'])->name('collections.edit');
Route::put('/collections/{id}', [CollectionController::class, 'update'])->name('collections.update');
Route::delete('/collections/{id}', [CollectionController::class, 'destroy'])->name('collections.destroy');
