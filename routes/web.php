<?php

use App\Http\Controllers\RegController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurrencyApiController;
use App\Http\Controllers\CurrencyConverterController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->middleware('guest')->name('home');

Route::get('/auth', [AuthController::class,'create'])->middleware('guest')->name('auth');
Route::post('/auth', [AuthController::class, 'store'])->middleware('guest');
Route::get('/logout', [AuthController::class,'destroy'])->middleware('auth')->name('logout');

Route::get('/reg', [RegController::class,'create'])->middleware('guest')->name('reg');
Route::post('/reg', [RegController::class, 'store'])->middleware('guest');


Route::get('/user', function () {return view('user');})->middleware('auth')->name('user');

Route::get('/currencies', [CurrencyApiController::class, 'getCurrencies'])->middleware('auth')->name('currency');

Route::get('/convert', [CurrencyConverterController::class, 'index'])->middleware('auth')->name('convert');