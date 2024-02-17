<?php
namespace App\Http\Middleware;
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


Route::get('/bankapp',function(){
    return view(('layouts/bankapp'));
});
Route::get('/bankappc',function(){
    return view(('layouts/bankfind'));
});

Route::get('/bankappu',function(){
    return view(('layouts/bankappupdate'));
});

Route::get('/bankappd',function(){
    return view(('layouts/bankappdelete'));
});

Route::post('/bank',function(){
    return view('layouts/bank');
});

Route:: get('/bank',function(){
    
    return view('layouts/bank');
});