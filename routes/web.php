<?php

use Illuminate\Support\Facades\Route;
class_alias('App\Http\Controllers\MemorialController', '\MemorialController');

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
    return view('memorial');
});

Route::get('/soldier', ['as' => 'soldier', 'uses' => 'MemorialController@index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
