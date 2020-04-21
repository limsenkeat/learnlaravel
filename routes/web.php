<?php

use Illuminate\Support\Facades\Route;
use App\Post;
use App\User;

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
//     $url = route("admin.home"); //return long url
//     return "This url is ".$url;
// }));


// Route::get('/posts/{id}', 'PostsController@index');

// Route::resource('posts', 'PostsController');

// Route::get('/contact', 'PostsController@contact');

// Route::get('/posts/{id}/{name}', 'PostsController@showPost');

/*
|--------------------------------------------------------------------------
| SQL CRUD
|--------------------------------------------------------------------------
*/
// Route::get('/insert', function () {
    
//     DB::insert('INSERT INTO posts (title, content) value(?, ?)', ['PHP Laravel', 'Learning Laravel now.']);

// });

// Route::get('/read', function () {
    
//     // $results = DB::select('SELECT * FROM posts WHERE id = ?', [1]);
//     $results = Post::all();

//     foreach($results as $post){
//         return $post->title;
//     }

// });

/*
|--------------------------------------------------------------------------
| Eqloquent 
|--------------------------------------------------------------------------
*/
// Route::get('/basicinsert', function () {
    
//     $post = new Post;
//     // $post = Post::find(2);

//     $post->title = 'New Title 2';
//     $post->content = 'New content sasd asd asd 2';
//     $post->save();

// });

// Route::get('/create', function () {
    
//     Post::create(['title' => 'this is title', 'content' => 'this is content']);

// });

// Route::get('/update', function () {
    
//     Post::where('id', 2)->where('is_admin', 0)->update(['title' => 'updated title', 'content' => 'updated content']);

// });

// Route::get('/delete', function () {
    
//     // $post = Post::find(4);
//     // $post->delete();

//     Post::destroy(5);

// });

// Route::get('/softdelete', function () {

//     Post::find(2)->delete();

// });

// Route::get('/readsoftdelete', function () {

//     return Post::onlyTrashed()->where('is_admin', 0)->get();

// });

// Route::get('/restore', function () {

//     Post::withTrashed()->where('is_admin', 0)->restore();

// });

// Route::get('/forcedelete', function () {

//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();

// });

/*
|--------------------------------------------------------------------------
| Eloquent relationships
|--------------------------------------------------------------------------
*/

//one to one relationship
Route::get('/user/{id}/post', function ($id) {

    return User::find($id)->post;

});

//one to one reverse relationship
Route::get('/post/{id}/user', function ($id) {

    return Post::find($id)->user->name;
    
});

//one to many relationship
Route::get('/posts', function () {

    $user = User::find(1);

    foreach($user->posts as $post){
        echo $post->title;
    }
    
});

//many to many relationship
Route::get('/user/{id}/role', function ($id) {

    $user = User::find($id);

    foreach($user->roles as $role){
        echo $role->name;
    }
    
});