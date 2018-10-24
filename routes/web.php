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

Route::get('/login', 'LoginController@showLogin');

Route::get('/criar-conta', function () {
    return 'criar-conta';
});

Route::get('/artigo', function () {
    return 'ver-artigo';
});

Route::get('/criar-artigo', function () {
    return 'criar-artigo';
});
