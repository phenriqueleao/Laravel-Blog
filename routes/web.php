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

//acesso a tela de login
Route::get('/login', 'LoginController@showLogin');

//enviar os dados do formulario
Route::post('/login', 'LoginController@submitLogin');

//logout
Route::get('/logout', 'LoginController@logout');

//mostrar pagina de criação de conta
Route::get('/criar-conta', 'RegisterController@showRegister');

//enviar os dados do usuário
Route::post('/criar-conta', 'RegisterController@createAccount');

Route::get('/artigo', function () {
    return 'ver-artigo';
});

Route::get('/criar-artigo', 'PostsController@createPost');

Route::post('/criar-artigo', 'PostsController@postSubmit');
