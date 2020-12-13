<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CartController;

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

Route::get('/test',function (){
    $fakeData = array(['a','b']);
    return view('layouts.dashboard',['listOfProduct'=>$fakeData]);
});

//Route::resource('upload',\App\Http\Controllers\Upload::class);

Route::resource('products',ProductController::class);

Route::resource('users',UserController::class);

Route::resource('carts',CartController::class);

Route::post('/carts/filter',[CartController::class,"filter"])->name("carts.filter");
//Route::get('users',function (){
//    return view()
//});
//php artisan migrate:fresh --seed
