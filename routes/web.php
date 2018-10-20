<?php

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
    return view('artigos');
});

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', 'LoginController@login');


Route::get('/criar-conta', function () {
    return view('criar-conta');
});
Route::post('/criar-conta', 'LoginController@create');

Route::get('/artigo', function () {
    return view('ver-artigo');
});


