<?php

use Illuminate\Support\Facades\Auth;
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
})->name('memorial');
Route::get('/soldierNotFound', function () {
    return view('soldierNotFound');
})->name('soldierNotFound');

Route::get('/soldiersList', ['as' => 'soldiersList', 'uses' => 'MemorialController@soldiersList']);
Route::get('/soldier', ['as' => 'soldier', 'uses' => 'MemorialController@soldier']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
