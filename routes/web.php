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

Route::get('/', function () {
    return redirect()->to('/short_url/create');
});

Route::group(['prefix' => 'login'], function() {
    
    Route::get('/', [
        'uses' => 'UserController@loginView'
    ]);

    Route::post('/', [
        'uses' => 'UserController@login'
    ]);
});

Route::group(['prefix' => 'register'], function() {

    Route::get('/', [
        'uses' => 'UserController@registerView'
    ]);

    Route::post('/', [
        'uses' => 'UserController@register'
    ]);

    Route::get('/google', [
        'uses' => 'UserController@googleLogin'
    ]);
});

Route::get('url/{code}', [
    'uses' => 'UrlShorterCntroller@viewUrl'
]);

Route::get('/google', [
    'uses' => 'UserController@googleLoginView'
]);

Route::group(['prefix' => 'short_url', 'middleware' => ['login']], function() {

    Route::get('/create', [
        'uses' => 'UrlShorterCntroller@createView'
    ]);

    Route::post('/create', [
        'uses' => 'UrlShorterCntroller@create'
    ]);
});

Route::get('logout', [
    'uses' => 'UserController@logout'
]);

Route::get('password-generator', [
    'uses' => 'UserController@passwordGenarator'
]);



