<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Mail\PostCommentedMail;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
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
    return new PostCommentedMail(Post::find(1));
});

Route::get('http', function () {
    $post = Http::get('https://jsonplaceholder.typicode.com/posts');
    return $post[80]['id']; 
});

Route::get('http-bikinresource', function () {
    return Http::post('https://jsonplaceholder.typicode.com/posts',[
        'userId' => 100,
        'title' => 'Title',
        'body' => 'Postingan Percobaan'
    ]);
});


Route::get('rajaongkir/prov', function () {
    return Http::withHeaders([
        'key' => '14af704b5baa1ca111789f25fd0f5423', 
    ]) -> get('https://api.rajaongkir.com/starter/province')['rajaongkir']['results'];
});

Route::get('rajaongkir/cost', function () {
    return Http::withHeaders([
        'key' => '14af704b5baa1ca111789f25fd0f5423', 
    ]) -> post('https://api.rajaongkir.com/starter/cost',[
        'origin' => 248,
        'destination' => 154,
        'weight' => 100,
        'courier' => 'jne',
    ])['rajaongkir']['results'];
});