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
    Route::get('/', 'HomeController@index');
    Route::get('/{locale}/home', 'HomeController@home');

    Route::get('/{locale}/templates/pipe-angle-cutting', 'PipeController@getPipeСut');
    Route::post('/data/pipe-cut', 'PipeController@postDataCut');

    Route::get('/{locale}/templates/image-generator', 'ImageGeneratorController@getImageGenerator');
    Route::post('/data/image-generator', 'ImageGeneratorController@postData');

    Route::any('/sitemap.xml', 'StaticController@sitemap')->name('sitemap');
