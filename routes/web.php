<?php

use Illuminate\Support\Facades\Route;
use App\Post;
use App\User;
use App\Role;
use App\Country;
Use App\Photo;
Use App\Video;
Use App\Tag;

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

Route::resource('posts', 'PostsController');

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

// //one to one relationship
// Route::get('/user/{id}/post', function ($id) {

//     return User::find($id)->post;

// });

// //one to one reverse relationship
// Route::get('/post/{id}/user', function ($id) {

//     return Post::find($id)->user->name;
    
// });

// //one to many relationship
// Route::get('/posts', function () {

//     $user = User::find(1);

//     foreach($user->posts as $post){
//         echo $post->title;
//     }
    
// });

// //many to many relationship
// Route::get('/user/{id}/role', function ($id) {

//     $user = User::find($id);

//     foreach($user->roles as $role){
//         echo $role->name;
//     }
    
// });

// //accessing Intermediate table
// Route::get('/user/pivot', function () {

//     $user = User::find(1);

//     foreach($user->roles as $role){
//         echo $role->pivot->created_at;
//     }
    
// });

// //has many through relations
// Route::get('/user/country', function () {

//     //get post by user country
//     $country = Country::find(3);

//     foreach($country->posts as $post){
//         echo $post->title;
//     }
    
// });

// //polymorphic one to many relationship
// Route::get('/user/photos', function () {

//     //get post by user country
//     $user = User::find(1);

//     foreach($user->photos as $photo){
//         echo $photo;
//     }
    
// });
// Route::get('/post/photos', function () {

//     //get photo by post id 1
//     $post = Post::find(1);

//     foreach($post->photos as $photo){
//         echo $photo;
//     }
    
// });

// //polymorphic reverse relationship
// Route::get('/photo/{id}/post', function ($id) {

//     $photo = Photo::findOrFail($id);

//     echo $photo->imageable;
    
// });

// //polymorphic many to many relationship
// Route::get('/post/tag', function () {

//     //find tag by post id 1
//     $post = Post::find(1);

//     foreach($post->tags as $tag){
//         echo $tag->name."<br>";
//     }
    
// });

// Route::get('/tag/post', function () {

//     //find tag by post id 1
//     $tag = Tag::find(2);

//     foreach($tag->posts as $post){
//         echo $post->title."<br>";
//     }
    
// });

// //Eloquent polymorphic one to many insert
// Route::get('/insert2', function () {

//     $post = Post::find(1);
//     $post->photos()->create(['path' => 'sample.jpg']);
    
// });
// //save with object
// Route::get('/insert3', function () {

//     $post = Post::find(1);
//     $photos = Photo::find(4);
//     $post->photos()->save($photos);
    
// });
// //unassign 
// Route::get('/unassign', function () {
    
//     $post = Post::find(1);
//     $post->photos()->whereId(4)->update(['imageable_id' => '', 'imageable_type' => '']);
    
// });

// //Eloquent polymorphic many to many insert
// Route::get('/insert4', function () {
    
//     //insert new post and tag
//     $post = Post::create([
//         'title' => 'Insert 4', 
//         'content' => 'Insert 4 content'
//     ]);
//     $tag1 = Tag::find(1);
//     $post->tags()->save($tag1);

//     //insert new video and tag
//     $video = Video::create([
//         'name' => 'Video 4'
//     ]);
//     $tag2 = Tag::find(2);
//     $video->tags()->save($tag2);
    
// });
// //attach
// Route::get('/attach', function () {
    
//     //assign tag 2 to post 4
//     $post = Post::find(4);
//     $post->tags()->attach(2);

// });

// //Eloquent polymorphic many to many delete
// Route::get('/delete2', function () {
    
//     //delete tag 2
//     $post = Post::find(4);
    
//     foreach($post->tags as $tag){
//         $tag->whereId(2)->delete(); //delete tag 2
//     }

// });