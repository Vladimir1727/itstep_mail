<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('users/{id}', function ($id) {
	//передача данных через адрес
    return $id;
});*/

/*Route::group(array('prefix'=>'users'), function () {
	Route::get('/{id}', function ($id){
    return $id;
	});
});*/

Route::get('home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('logout', 'HomeController@logout');
Route::get('/model', 'HomeController@model');
Route::group(['middleware'=>'auth'],function(){
Route::resource('subscribers', 'SubscriberController');//добавляет группы роутеров для SubscriberController
Route::get('subscriber/list', 'SubscriberController@lists');
});