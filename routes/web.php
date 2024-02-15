<?php

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
    return view('welcome');
});

Route::get('/pro', function () {
    return view('layouts/mypage');
});
Route::get('/pr', function () {
    return view('layouts/teast');
});


Route::get('/apiviews',function(){
    return view(('api'));
});