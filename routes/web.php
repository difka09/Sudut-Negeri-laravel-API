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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('imageupload',['as'=>'image.upload','uses'=>'ProjectController@imageUpload']);

//::post('imageupload',['as'=>'image.upload.post','uses'=>'ImageUploadController@imageUploadPost']);

Route::get('clearcache', function() {
    $exitCode = Artisan::call('config:cache');
   return 'sukses';
});

Route::get('clearcache1', function() {
    $exitCode = Artisan::call('config:clear');
   return 'sukses';
});

Route::get('file/upload', 'ProjectController@form')->name('file.form');
Route::get('file/index', 'ProjectController@index')->name('file.index');
Route::post('file/upload', 'ProjectController@upload')->name('file.upload');
Route::get('file/{file}/download', 'ProjectController@download')->name('file.download');
Route::get('file/{file}/response', 'ProjectController@response')->name('file.response');

// multiple upload
Route::get('file/multiple/upload', 'MultipleFileController@form')->name('multiple.form');
Route::post('file/multiple/upload', 'MultipleFileController@upload')->name('multiple.upload');


Route::get('imageupload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload']);

Route::post('imageupload',['as'=>'image.upload.post','uses'=>'ImageUploadController@store']);