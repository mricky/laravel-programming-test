<?php

use App\Http\Middleware\GuestMiddleware;
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

Route::get('/','HomeController@home');

Route::view('/template','template');

Route::group(['prefix'=>'login'], function(){
    Route::get('/','UserController@login')->middleware(['guest']);
    Route::post('/','UserController@doLogin')->middleware(['guest']);
  
});
Route::post('/logout','UserController@doLogout')->middleware(['member']);

Route::group(['prefix'=>'cartlist'], function(){
    Route::GET('/','CartController@cartList')->middleware(['member']);
    Route::POST('/add','CartController@updatePlus')->middleware(['member']);
    Route::POST('/minus','CartController@updateMinus')->middleware(['member']);
    Route::POST('/delete','CartController@removeDetail')->middleware(['member']);
    Route::POST('/discount','CartController@usingDiscount')->middleware(['member']);
});
