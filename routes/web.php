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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/overview', 'AccountsController@index')->name('overview');

    Route::get('/open-an-account', function () {
        return view('accounts.open-an-account');
    })->name('open-an-account');

    Route::get('/payment', function () {
        return view('payment');
    })->name('payment');

    Route::resource('accounts', 'AccountsController')->except([
        'index', 'create', 'edit'
    ]);

    Route::resource('transactions', 'TransactionsController')->only([
        'store', 'update', 'destroy'
    ]);

});
