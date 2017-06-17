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
