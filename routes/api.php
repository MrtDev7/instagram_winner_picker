<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/instagram/comments/p/{id}' , [ApiController::class , 'instagramComments'])->name('instagram-comments');
Route::get('/instagram/comments/more/{id}' , [ApiController::class , 'instagramMoreComments'])->name('more-comments');