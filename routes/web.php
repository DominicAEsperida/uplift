<?php

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact-us', [App\Http\Controllers\ContactController::class, 'index']);
Route::post('/contact-us', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.us.store');

Route::get('/videos', [App\Http\Controllers\VideoController::class, 'index'])->name('videos');
Route::get('/texts', [App\Http\Controllers\TextController::class, 'index'])->name('texts');
Route::get('/forums', [App\Http\Controllers\ForumController::class, 'index'])->name('forums');
Route::post('/post', [App\Http\Controllers\ForumController::class, 'postThread'])->name('post-thread');


Route::get('/content/view/{id}', [App\Http\Controllers\ForumController::class, 'viewContent'])->name('view-content');
Route::post('/content/post-comment', [App\Http\Controllers\ForumController::class, 'postComment'])->name('post-comment');
Route::get('/shop/add', [App\Http\Controllers\ProductController::class, 'create'])->name('add');
Route::post('/shop/store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::get('/shop/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
Route::patch('/shop/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update');
Route::delete('/shop/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('delete');
