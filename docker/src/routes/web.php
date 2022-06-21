<?php

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

Route::get('/index',[\App\Http\Controllers\CustomerController::class,'index'])->name('index');


Route::get('/create-customer',[\App\Http\Controllers\CustomerController::class,'getCustomer'])->name('get.Customer');
Route::post('/create-customer',[\App\Http\Controllers\CustomerController::class,'postCustomer'])->name('post.Customer');

Route::get('/edit-customer/{id}',[\App\Http\Controllers\CustomerController::class,'getUpdateCustomer'])->name('get.updateCustomer');
Route::post('/edit-customer/{id}',[\App\Http\Controllers\CustomerController::class,'postUpdateCustomer'])->name('post.updateCustomer');
Route::get('/delete-customer/{id}',[\App\Http\Controllers\CustomerController::class,'getDeleteCustomer'])->name('get.deleteCustomer');
