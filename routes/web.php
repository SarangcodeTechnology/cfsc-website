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

Route::get('/', 'PageController@index');
Route::post('/complain', 'EmailController@sendComplain');
Route::post('/contact', 'EmailController@sendContact');
Route::get('/d/{slug}', 'PageController@dynamicPage');

Route::get('/s/{slug}', 'PageController@staticPage');



Route::group(['prefix' => 'myadmin'], function () {
    Voyager::routes();
});
