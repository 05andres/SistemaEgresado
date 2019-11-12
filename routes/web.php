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



Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard-admin', function (){
        return view('root.admin');
    })->name('admin.dashboard'); // <--- este es el nombre que busca el controlador.

    Route::get('register-admin',function (){
        return view('root.registeradmin');
    })->name('admin.register');;

    Route::post('regisad','RootController@AdminResgister')->name('registroad');
});

route::get('register',function(){
    return view('admin.registeregresado');

})->name('register.egre');

Route::post('regisegre','AdminController@registeregresado')->name('registregre');


Route::post('/post','PostsController@create');
Route::get('/posts','PostsController@index');


