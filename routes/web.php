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

Route::get('/articulos', 'ArticlesController@index'
);
Route::get('/carrito', 'CarritoController@index'
);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('homes');
Route::post('/', 'NewArticleController@crear')->name('notas.crear');

Route::get('/new', 'NewArticleController@index')->name('newArticle');
Route::get('/check', 'CheckController@index')->name('check');
Route::patch('/check', 'CheckController@crear')->name('check.crear');
Route::post('/articulos', 'CarritoController@crear')->name('carrito.crear');

Route::get('/admArticulos', 'ArticlesController@edit')->name('admArticulos');
Route::get('/admArticlesUpdate', 'ArticlesController@update')->name('admArticlesUpdate');
Route::post('/admArticlesUpdate', 'ArticlesController@updateItem')->name('admArticlesUpdate.crear');
