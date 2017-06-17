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
    return view('welcome');
});


Route::get('/hello', function() {
    echo 'Hello world!';
})->name('news.index');

Route::match(['get', 'post'], '/hello/{name}', function($name) {
    echo 'Hello ' . $name;
})->where('name', '[0-9]+');


Route::get('/news', 'NewsController@index');
Route::post('/news', 'NewsController@store');
Route::put('/news/{news_id}', 'NewsController@update');
Route::get('/news/{news_id}', 'NewsController@show');

Route::get('/news/test/foo/{param1}/{param2}', 'NewsController@test')->name('news.test');

Route::resource('brands', 'BrandsController', ['except' => [
    'create', 'edit'
]]);

Route::group([
    'namespace' => 'V1',
    'prefix' => 'v1'
], function() {
    Route::get('/news', 'NewsController@index');
    Route::post('/news', 'NewsController@store');
    Route::put('/news/{news_id}', 'NewsController@update');
    Route::get('/news/{news}', 'NewsController@show');

    Route::resource('brands', 'BrandsController', ['except' => [
        'create', 'edit'
    ]]);
});



