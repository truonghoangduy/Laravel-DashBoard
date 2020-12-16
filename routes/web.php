<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\ProfileController;
use \Diglactic\Breadcrumbs\Breadcrumbs;
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
Auth::routes();


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',function (){
    $fakeData = array(['a','b']);
    return view('layouts.dashboard',['listOfProduct'=>$fakeData]);
});

//Route::resource('upload',\App\Http\Controllers\Upload::class);

Route::resource('products',ProductController::class)
    ->middleware(['auth','role:admin,editor']);

Route::resource('users',UserController::class)
    ->middleware(['auth','role:admin']);

Route::resource('carts',CartController::class)
    ->middleware(['auth','role:admin,editor']);

Route::get('/carts/{cart}/{product}/remove',[CartController::class,'removeproduct'])
    ->name('carts.removeproduct');

Route::post('/carts/filter',[CartController::class,"filter"])
    ->name("carts.filter")->middleware(['auth','role:admin,editor']);

Route::get('/profiles/{user}/check',[ProfileController::class,'check'])
    ->name("profiles.check")->middleware(['auth','role:admin,editor']);

Route::get('/profiles/{user}/createWithUserID',[ProfileController::class,'createWithUserID'])
    ->name("profiles.createWithUserID")->middleware(['auth','role:admin,editor']);

//createWithUserID
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);

Route::resource('profiles',ProfileController::class)->middleware(['auth','role:admin,editor']);

