<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'indexLogin'])->name('page.login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'indexRegister'])->name('page.register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('dashboard', function () {
        return view('dashboard.dashboard');
    })->name('page.dashboard');

    // post
    Route::get('post', [PostController::class, 'index'])->name('page.post.index');
    Route::get('post/create', [PostController::class, 'create'])->name('page.post.create');
    Route::post('post', [PostController::class, 'store'])->name('page.post.store');
    Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('page.post.edit');
    Route::delete('post/{post}', [PostController::class, 'destroy'])->name('page.post.destroy');

    // page
    Route::get('page', [PageController::class, 'index'])->name('page.page.index');
    Route::get('page/unit', [PageController::class, 'unit'])->name('page.unit.index');
});