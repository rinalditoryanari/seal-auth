<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Mail\PostCommentedMail;
use App\Models\Post;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard',[
        'posts' => Post::latest()->get(),
    ]);
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

Route::get('/user', [UserController::class, 'index']) -> name('user.index');
Route::get('/user/detail', [UserController::class, 'detail']) -> name('user.index');
Route::get('/user/create', [UserController::class, 'create']) -> name('user.create');
Route::get('/user/{id}', [UserController::class, 'show']) -> name('user.show');
Route::post('/store', [UserController::class, 'store']) -> name('user.store');

Route::get('post/create', [PostController::class, 'create'])->name('post.create')->middleware('auth');
Route::post('post', [PostController::class, 'store'])->name('post.store')->middleware('auth');

Route::get('post/{post}/edit', [PostController::class,'edit'])->name('post.edit');
Route::get('post/{post}', [PostController::class,'show'])->name('post.show');

Route::post('post/{post}/comment', [CommentController::class, 'store'])->name('comment.store');

Route::get('comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::delete('comment/{id}/destroy', [CommentController::class, 'destroy'])->name('comment.destroy');

// Route::resource('comment', CommentController::class);

Route::get('postcommentedmail', function () {
    return new PostCommentedMail;
});