<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//api landing
Route::get('landings', 'LandingController@index');
Route::get('donation', 'LandingController@showTotal');
//api projects
Route::get('projects', 'ProjectController@index');
Route::get('projects/{project}', 'ProjectController@show');
Route::get('projects/verify/{verify}', 'ProjectController@showVerify');
Route::post('projects', 'ProjectController@store');
Route::put('projects/{project}','ProjectController@update');
Route::delete('projects/{project}', 'ProjectController@delete');
//api detail
Route::get('details','DetailController@show');
Route::get('details/{id}', 'DetailController@showId');
Route::get('details/creator/{id_user}', 'DetailController@showIdUser');
//api user
Route::get('users','UserController@index');
Route::get('users/{user}','UserController@show');
Route::get('users/verify/{verify}', 'UserController@showVerify');
Route::delete('users/{user}', 'UserController@delete');
Route::put('users/{user}','UserController@update');

//auth api
Route::post('register', 'Auth\RegisterController@register');
Route::post('login/user', 'Auth\LoginController@login');
Route::post('login/user/cek', 'Auth\LoginController@ceklogin');
Route::post('login/admin', 'Auth\AdminLoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::post('reset/password', 'Auth\ForgotPasswordController@sendResetLink');




//Route::group(['middleware' => 'auth:api'], function(){
  //  Route::get('logout', 'Api\LoginController@logout');
 //   Route::get('articles', 'ArticleController@index');
   //Route::get('articles', 'ArticleController@show');
    //Route::post('articles','ArticleController@store');
    //Route::put('articles/{articles}', 'ArticleController@update');
    //Route::delete('articles/{article}','ArticleController@delete');
//});


Route::get('clearcache', function() {
    $exitCode = Artisan::call('config:cache');
    // return what you want
});