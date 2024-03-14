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


Route::get('/fimdejogo' , function (){
    return view('fim_de_jogo');
});

Route::get('/vitoria', function(){
    return view('vitoria');
});
Route::get('/game', function(){
    return view('game');
});
