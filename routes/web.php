<?php

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

use App\Post;
use App\Tag;
use App\Vodeo;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    $post = Post::create(['name' => 'First post']);
    $tag1 = Tag::find(1);
    $post->tags()->save($tag1);

    $video = Vodeo::create(['name' => 'video.mov']);
    $tag2 = Tag::find(1);
    $video->tags()->save($tag2);
});

Route::get('/read', function () {
    $post = Post::findOrFail(1);
    foreach ($post->tags as $tag) {
        echo $tag . '<br>';
    }
});

Route::get('/update', function () {
//    $post = Post::findOrFail(1);
//    foreach ($post->tags as $tag) {
//        $tag->whereName('Javascript')->update(['name' => 'HTML']);
//    }
//    another way
    $post = Post::findOrFail(1);
    $tag = Tag::findOrFail(2);
    $post->tags()->save($tag);
});

Route::get('/delete', function () {
    $post = Post::findOrFail(1);
    foreach ($post->tags as $tag) {
        $tag->whereName('Javascript')->update(['name' => 'HTML']);
    }
});

Route::get('/delete', function () {
    $post = Post::findOrFail(2);
    foreach ($post->tags as $tag) {
        $tag->whereId(2)->delete();
    }
});
