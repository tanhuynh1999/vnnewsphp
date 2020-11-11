<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserConttroller;
use App\Http\Controllers\ViewControler;
use App\Http\Controllers\SubmitControler;
use App\Http\Controllers\AjaxController;
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


Route::get('/login-cc', function () {
    return view('include.login');
});


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
Route::post('/cancel-favourite-id', [UserConttroller::class, 'cancelFavouriteID']);

//thich
Route::post('/like', [UserConttroller::class, 'like']);
//Huy thich
Route::post('/cancel-like', [UserConttroller::class, 'cancelLike']);

//view fa
Route::get('/all-favourite', [ViewControler::class, 'ViewFavourite']);

//view comment
Route::get('all-comment', [ViewControler::class, 'ViewComment']);

//Binh luan
Route::post('/comment-id', [UserConttroller::class, 'commentID']);

//Cai day user
Route::get('user-setting', [ViewControler::class, 'userSetting']);

//editor
Route::get('/editor', [ViewControler::class, 'editor']);


//ADMin
Route::get('/indexadmin', [AdminController::class, 'indexAdmin']);

//Xoa tin vinh vien
Route::get('/delete-news-{id}', [SubmitControler::class, 'deleteNewsID']);
//Xoa tin vao thung rac
Route::get('/del-news-{id}', [SubmitControler::class, 'delNewsID']);

//Sua tin tuc
Route::get('/editnews-{id}', [AdminController::class, 'editNews']);
Route::post('/editnews-post', [AdminController::class, 'editNewsPost']);

//News
Route::get('/news-admin', [AjaxController::class, 'ajaxNews']);
Route::get('/news-all-admin', [AjaxController::class, 'ajaxAllNews']);
Route::get('/news-notactive-admin', [AjaxController::class, 'ajaxNotActiveNews']);
