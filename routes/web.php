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
    return 'artigos';
});

Route::get('/login', 'LoginController@showLogin');
Route::post('/login', 'LoginController@login');



Route::get('/criar-conta', 'RegisterController@showRegisterForm');
Route::post('/criar-conta', 'RegisterController@createAccount');




Route::get('/artigo', function () {
    return 'ver-artigo';
});

Route::get('/criar-artigo', function () {
    return 'criar-artigo';
});
