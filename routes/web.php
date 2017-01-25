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

Route::get('test/{id}', 'TestController@index');
Route::get('photo-test', 'Photos\TestController@index');
Route::get('home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('logout', 'HomeController@logout');

