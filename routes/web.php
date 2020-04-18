<?php

use Illuminate\Support\Facades\Route;
use App\Post;

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

// Route::get('/contact/{id}/{name}', function ($id) {
//     return "Contact Page: ".$id." - ".$name;
// });

// Route::get('/admin/posts/example', array( "as" => "admin.home", function () {

//     $url = route("admin.home");
//     return "This url is ".$url;

// }));


// Route::get('/posts/{id}', 'PostsController@index');

// Route::resource('posts', 'PostsController');

Route::get('/contact', 'PostsController@contact');

Route::get('/posts/{id}/{name}', 'PostsController@showPost');

Route::get('/insert', function () {
    
    DB::insert('INSERT INTO posts (title, content) value(?, ?)', ['PHP Laravel', 'Learning Laravel now.']);

});

Route::get('/read', function () {
    
    // $results = DB::select('SELECT * FROM posts WHERE id = ?', [1]);
    $results = Post::all();

    foreach($results as $post){
        return $post->title;
    }

});

Route::get('/basicinsert', function () {
    
    $post = new Post;
    // $post = Post::find(2);

    $post->title = 'New Title 2';
    $post->content = 'New content sasd asd asd 2';
    $post->save();

});

Route::get('/create', function () {
    
    Post::create(['title' => 'this is title', 'content' => 'this is content']);

});

Route::get('/update', function () {
    
    Post::where('id', 2)->where('is_admin', 0)->update(['title' => 'updated title', 'content' => 'updated content']);

});

Route::get('/delete', function () {
    
    // $post = Post::find(4);
    // $post->delete();

    Post::destroy(5);

});

Route::get('/softdelete', function () {

    Post::find(2)->delete();

});

Route::get('/readsoftdelete', function () {

    return Post::onlyTrashed()->where('is_admin', 0)->get();

});

Route::get('/restore', function () {

    Post::withTrashed()->where('is_admin', 0)->restore();

});

Route::get('/forcedelete', function () {

    Post::onlyTrashed()->where('is_admin', 0)->forceDelete();

});