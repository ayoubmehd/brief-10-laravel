<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use App\Models\Comment;
use Illuminate\Support\Facades\App;
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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();


Route::middleware('auth.admin')->prefix('admin')->group(function () {
    Route::get('/add', [MovieController::class, 'create'])->name('add');
    Route::post('/add', [MovieController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [MovieController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [MovieController::class, 'destroy'])->name('destroy');
});
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::post('comments/{movie_id}', [CommentController::class, 'store'])->name('comments.create');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie');
