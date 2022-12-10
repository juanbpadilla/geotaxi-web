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


Route::get('/',['as' => 'index', function () {
    return view('welcome');
}]);


// Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('volver', function(){
    return Redirect::back();
});

Route::resource('mensajes', 'MessagesController');

Route::resource('repuesta', 'MessageResponderController');

Route::resource('usuarios', 'UsersController');

Route::resource('pasajeros', 'PassangerController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
