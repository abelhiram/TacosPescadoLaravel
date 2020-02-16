<?php
use App\Events\formSubmit;
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

Route::get('/enviarr/id/{id}', function () {
    $message = request()->id;
    event(new formSubmit($message));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
