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

use App\Models\Post;


/*
Route::get('/', function () {

    // $posts = Post::all();

    // foreach($posts as $post){
    //     echo "<br>".$post->user->nickname."<br>";
    //     echo $post->content."<br>";
    //     echo "<h4>Comenterios:</h4>";

    //     foreach($post->comments as $comment){
    //         echo "$comment->comment <br>";
    //     }
    //     echo "<hr>";
    // }

    return view('welcome');
});
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/setting', [App\Http\Controllers\UserController::class, 'config'])->name('setting');
Route::post('/edit', [App\Http\Controllers\UserController::class, 'update'])->name('edit');
Route::get('/user/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImage'])->name('user.avatar');
Route::post('/save', [App\Http\Controllers\PostController::class, 'save'])->name('save');
Route::get('/like/{post_id}', [App\Http\Controllers\LikeController::class, 'newLike'])->name('like');
