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

Route::get('/criar-conta', function () {
    return view('criar-conta');
});

Route::get('/artigo', function () {
    return view('ver-artigo');
});

Route::get('/criar-artigo', function () {
    return view('criar-artigo');
});

Route::get('/criar-artigo', function () {
    return view('criar-artigo');
});


