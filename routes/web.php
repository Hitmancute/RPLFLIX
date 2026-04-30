<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'inregister']);

Route::middleware(['auth','checkRole:admin'])->group(function() {
    Route::resource('/user',UserController::class);
    Route::resource('/genre',GenreController::class);
});

Route::middleware(['auth'])->group(function(){
    Route::resource('content',ContentController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});


// Route::middleware(['auth', 'checkRole:admin'])->get('/admin', function () {
//     return view('dashboard.admin');
// });
// Route::middleware(['auth', 'checkRole:member'])->get('/member', function () {
//     return view('dashboard.member');
// });
