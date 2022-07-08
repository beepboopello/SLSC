<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AccessController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------function () {------------------------
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/warp/{place}', [PlaceController::class,'directTo'])->name('directTo');
Route::get('/user/{id}',[UserController::class,'User_profile'])->name('User_profile');
Route::get('edit_profile',[UserController::class,'getEditForm'])->name('getEditForm');
Route::get('/post/{id}',[PostController::class,'viewOnePost'])->name('viewOnePost');
Route::get('/shop',[AccessController::class,'armorShopDisplay'])->name('displayShop');
Route::get('/shop/{id}',[AccessController::class,'getSet'])->name('getSet');

Route::post('savePost',[PostController::class,'savePost'])->name('savePost');
Route::post('/edit_profile',[UserController::class,'editProfile'])->name('editProfile');
Route::post('/password',[UserController::class,'changePassword'])->name('ChangePassword');

