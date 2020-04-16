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

