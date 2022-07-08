<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/praisePost/{uid}/{pid}', [PostController::class,'praisePost'])->name('praisePost');
Route::post('/rejectPost/{uid}/{pid}', [PostController::class,'rejectPost'])->name('rejectPost');
Route::post('/comment', [PostCommentController::class,'createComment'])->name('comment');

// Route::group(['middleware' => ['auth:api']], function() {

// });