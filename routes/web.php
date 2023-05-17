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
  return view('welcome');
});

Route::get('/about', function () {
  return 'Dimon';
});

// Route::get('/scanner', function () {
//   return view('index2');
// });

Route::post('/register', 'App\Http\Controllers\UserController@register');
Route::post('/validate', 'App\Http\Controllers\UserController@validateUser');
Route::get('/getuser', 'App\Http\Controllers\UserController@getUser');
Route::get('/users', 'App\Http\Controllers\UserController@Users');
Route::post('/generate-qr', 'App\Http\Controllers\QRController@generateQR')->name('generate_qr');
Route::get('/export', 'App\Http\Controllers\ExportController@export')->name('export');
