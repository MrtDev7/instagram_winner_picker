<?php

use App\Http\Controllers\PageController;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;


// dashboard route
Route::get('/dashboard/{any}', function () {
    return view('welcome');
})->where('any', '.*');



/// login routes
Route::post('/login/verification/{id}', [Login::class, 'emailverification']);
Route::get('/login/verification/back/{id}', [Login::class, 'emailverification_back'])->name('emailverification');
Route::post('/login/passwordreset/{for?}', [Login::class, 'passwordreset']);
Route::get('/login/passwordreset/back/{id}/{for?}', [Login::class, 'passwordreset_back'])->name('passwordreset');
Route::post('/login', [Login::class, 'user'])->name('login');
Route::get('/logout', [Login::class, 'logout'])->name('logout');
Route::get('/register', [Login::class, 'register'])->name('register');





// website routes
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', [PageController::class, 'index'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
    Route::get('/instagram-comment-winner-picker',[PageController::class, 'instagram']);
    Route::get('/instagram/comments/p/{id}' , [PageController::class , 'instagramComments'])->name('instagram-comments');
    Route::get('/instagram/comments/more/{id}' , [PageController::class , 'instagramMoreComments'])->name('more-comments');
});








/*
Route::get('payment', [PayPalController::class, 'payment'])->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');
*/
