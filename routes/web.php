<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\CreatorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/login', [AuthController::class, 'indexLogin'])->name('page.login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'indexRegister'])->name('page.register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('page.dashboard');

    // logout
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // post
    Route::get('post', [PostController::class, 'index'])->name('page.post.index');
    Route::get('post/create', [PostController::class, 'create'])->name('page.post.create');
    Route::post('post', [PostController::class, 'store'])->name('page.post.store');
    Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('page.post.edit');
    Route::delete('post/{post}', [PostController::class, 'destroy'])->name('page.post.destroy');

    // page
    Route::get('page', [PageController::class, 'index'])->name('page.page.index');
    Route::post('page', [PageController::class, 'store'])->name('page.page.store');
    Route::get('page/avatar/delete', [PageController::class, 'deleteAvatar'])->name('page.avatar.delete');
    Route::get('page/header/delete', [PageController::class, 'deleteHeader'])->name('page.header.delete');

    // unit
    Route::get('page/unit', [PageController::class, 'unit'])->name('page.unit.index');
    Route::post('page/unit', [PageController::class, 'storeUnit'])->name('page.unit.store');
    Route::post('page/unit/update', [PageController::class, 'updateUnit'])->name('page.unit.update');
    Route::get('page/unit/{unit}/delete', [PageController::class, 'deleteUnit'])->name('page.unit.delete');

    // social links
    Route::post('social-links', [PageController::class, 'socialLinks'])->name('api.social-links');
    Route::get('social-links/{id}/delete', [PageController::class, 'deleteSocialLink'])->name('api.social-links.delete');

    // payment
    Route::post('payment', [PaymentController::class, 'payment'])->name('api.payment');

    // balance
    Route::get('balance', [BalanceController::class, 'index'])->name('page.balance');
    Route::post('balance/check-bank', [BalanceController::class, 'checkAccountBank'])->name('api.balance.check-bank');
    Route::post('balance/save-bank', [BalanceController::class, 'saveBankAccount'])->name('api.balance.save-bank');

    // support
    Route::get('supporters/users', [SupportController::class, 'supportUser'])->name('page.support.user');
    Route::get('supporters/anonymous', [SupportController::class, 'supportAnon'])->name('page.support.anonim');
});

Route::post('/payment/notification', [PaymentController::class, 'notification'])->name('payment.notif');
Route::get('checkout/{transaction}', [PaymentController::class, 'checkout'])->name('page.checkout');
Route::get('payment-status/{transaction}', [PaymentController::class, 'paymentStatus'])->name('page.payment-status');

Route::get('/explore', [CreatorController::class, 'explore'])->name('page.explore');
Route::get('/{username}', [CreatorController::class, 'index'])->name('page.creator');
Route::get('/{username}/post', [CreatorController::class, 'post'])->name('page.creator.post');
