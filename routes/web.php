<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('login/submit', [LoginController::class, 'auth_login'])
                         ->name('login_auth');

Route::get('/logout',[LoginController::class,'logout']);



Route::group(['middleware'=>['customAuth']],function(){
    Route::get('/dashboard',[ProductController::class, 'index'])->name('dashboard');
    Route::get('/add',[ProductController::class, 'addProduct'])->name('add');
    Route::post('/add','ProductController@storeProduct');
    Route::get('edit/{id}','ProductController@editProduct');
    Route::post('/update/{id}','ProductController@updateProduct');
    Route::get('email','LoginController@sendMail');
    Route::post('email/send','LoginController@send');
    Route::get('/registration','RegisterController@index');
    Route::post('/registration/register','RegisterController@store');
    Route::get('delete/{id}','productController@delete');
    Route::get('login',[LoginController::class,'index']);

});