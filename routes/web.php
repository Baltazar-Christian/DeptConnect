<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProspectController;
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


Route::get('/collection-form', [App\Http\Controllers\CollectionController::class, 'index'])->name('collection-form');
Route::post('/collection', [App\Http\Controllers\CollectionController::class, 'store'])->name('collection-save');
