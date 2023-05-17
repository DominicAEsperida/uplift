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

Route::get('/contact-us', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.us');
Route::post('/contact-us', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.us.store');

Route::get('/videos', [App\Http\Controllers\VideoController::class, 'index'])->name('videos');
Route::get('/texts', [App\Http\Controllers\TextController::class, 'index'])->name('texts');
Route::get('/forums', [App\Http\Controllers\ForumController::class, 'index'])->name('forums');
Route::post('/post', [App\Http\Controllers\ForumController::class, 'postThread'])->name('post-thread');


Route::get('/content/view/{id}', [App\Http\Controllers\ForumController::class, 'viewContent'])->name('view-content');
Route::post('/content/edit-content', [App\Http\Controllers\ForumController::class, 'editContent'])->name('edit-content');
Route::post('/content/delete-content', [App\Http\Controllers\ForumController::class, 'deleteContent'])->name('delete-content');

Route::post('/content/post-comment', [App\Http\Controllers\ForumController::class, 'postComment'])->name('post-comment');
Route::post('/content/edit-comment', [App\Http\Controllers\ForumController::class, 'editComment'])->name('edit-comment');
Route::post('/content/delete-comment', [App\Http\Controllers\ForumController::class, 'deleteComment'])->name('delete-comment');

