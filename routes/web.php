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

// Route::get('/',function (){
//   return view('frontend.main');
// })->name('main');

Route::get('/', function () {
  $info = ['name'=>'Thet Paing Htut'];
  return view('welcome',['array' => $info]);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'WebPostController');
Route::resource('projects', 'WebProjectController');