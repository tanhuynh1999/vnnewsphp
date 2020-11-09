<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserConttroller;
use App\Http\Controllers\ViewControler;
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

Route::get('/', [HomeController::class, 'Index']);





Route::get('/test', [HomeController::class, 'Blade']);


Route::get('/indexcategory', [AdminController::class, 'IndexCategory']);
Route::post('/createcategory', [AdminController::class, 'CreateCategory']);

Route::get('/indexnews', [AdminController::class, 'IndexNews']);
Route::get('/createnews', [AdminController::class, 'AddNews']);
Route::post('/postaddnews', [AdminController::class, 'PostAddNews']);

Route::get('detailnews-{id}', [ViewControler::class, 'DetailNews']);

Route::get('allnews', [ViewControler::class, 'AllNews']);

Route::get('searchcate-{id}', [ViewControler::class, 'DetailCate']);

Route::get('login', [UserConttroller::class, 'Login']);

Route::get('getlogin/{social}', [UserConttroller::class, 'GetLogin']);
Route::get('checklogin/{social}', [UserConttroller::class, 'CheckLogin']);


Route::get('reg', [UserConttroller::class, 'Reg']);
Route::post('loginpost', [UserConttroller::class, 'PostLogin']);
Route::post('regpost', [UserConttroller::class, 'PostReg']);

//login facebook
Route::get('/login/facebook', [UserConttroller::class, 'redirectToProvider']);
Route::get('/login/facebook/callback', [UserConttroller::class, 'handleProviderCallback']);

//Dang xuat
Route::get('logout', [UserConttroller::class, 'logOut']);

//Yeu thich
Route::post('/favourite', [UserConttroller::class, 'favourite']);

//Huy yeu thich
Route::post('/cancel-favourite', [UserConttroller::class, 'cancelFavourite']);