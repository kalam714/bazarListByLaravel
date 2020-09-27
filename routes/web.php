<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

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

Route::get('/', [ListingController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/listing', [ListingController::class, 'index']);
Route::get('/listing/create', [ListingController::class, 'create']);
Route::post('/listing/store', [ListingController::class, 'store']);
Route::get('/listing/edit/{id}', [ListingController::class, 'edit']);
Route::put('/listing/update/{id}', [ListingController::class, 'update']);
Route::delete('/listing/destroy/{id}', [ListingController::class, 'destroy']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
