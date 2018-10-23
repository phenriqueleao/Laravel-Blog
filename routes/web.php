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
Route::get('/', 'PostsController@postList');

Route::get('/login', 'LoginController@showLogin');
Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout');



Route::get('/criar-conta', 'RegisterController@showRegisterForm');
Route::post('/criar-conta', 'RegisterController@createAccount');


//pegar o post para ser editado
Route::get('/artigo/editar/{postSlug}', 'PostsController@getPostEdit');
Route::post('/artigo/editar/{postSlug}', 'PostsController@submitPostEdit');

Route::get('/artigo/remover/{postSlug}', 'PostsController@removePost');

Route::get('/artigo/{postSlug}', 'PostsController@getPost');

Route::get('/criar-artigo', 'PostsController@createPost');
Route::post('/criar-artigo', 'PostsController@createPostSubmit');
