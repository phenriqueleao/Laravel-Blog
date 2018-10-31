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
Route::get('/', 'PostsController@allPosts');

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

//criar artigo
Route::get('/criar-artigo', 'PostsController@createPost');
Route::post('/criar-artigo', 'PostsController@postSubmit');

//pega artigo
Route::get('/artigo/{slug}', 'PostsController@getPost');

//pega formulário de edição do artigo
Route::get('/artigo/editar/{slug}', 'PostsController@getPostEdit');

//envia edição de artigo
Route::post('/artigo/editar/{slug}', 'PostsController@postEditSubmit');

//apaga artigo
Route::get('/artigo/remover/{slug}', 'PostsController@removePost');

//cria comentário
Route::post('/artigo/{slug}/adicionar-comentario', 'CommentController@createCommentSubmit');

//apaga comentário
Route::get('/artigo/{slug}/remover-comentario', 'CommentController@removeComment');