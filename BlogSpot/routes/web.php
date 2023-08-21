<?php

use App\Http\Controllers\BlogPostController;
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
Auth::routes();
Route::get('/home', [BlogPostController::class, 'show'])->name('home');
Route::view('/blog/add', 'AddNewBlog');
Route::post('/blog/create', [BlogPostController::class, 'store']);
Route::get('/blog/edit/{id}', [BlogPostController::class, 'edit']);
Route::get('/blog/delete/{id}', [BlogPostController::class, 'destroy']);
Route::put('/blog/update/{id}', [BlogPostController::class, 'update']);
Route::get('/blog/view/{id}', [BlogPostController::class, 'view']);


