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

Route::get('/enviar/comida/{comida}/cantidad/{cantidad}/sugerencias/{sugerencias}/subtotal/{subtotal}/img/{img}', function () {
    $comida = request()->comida;
    $cantidad = request()->cantidad;
    $sugerencias = request()->sugerencias;
    $subtotal = request()->subtotal;
    $img = request()->img;
    event(new formSubmit($comida,$cantidad,$sugerencias,$subtotal,$img));
});
Route::get('/enviarr/comida/{comida}/cantidad/{cantidad}/sugerencias/{sugerencias}/subtotal/{subtotal}/img/{img}', function () {
    $comida = request()->comida;
    $cantidad = request()->cantidad;
    $sugerencias = request()->sugerencias;
    $subtotal = request()->subtotal;
    $img = request()->img;
    event(new formSubmit($comida,$cantidad,$sugerencias,$subtotal,$img));

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inicio', 'HomeController@inicio');

//Crud Usuarios
Route::post('users/store', 'UserController@store');
Route::get('users/index', 'UserController@index');
Route::post('users/store', 'UserController@store');
Route::post('users/{id}', 'UserController@update');
Route::get('users/delete/{id}','UserController@destroy');


Route::resource('users', 'UserController');



