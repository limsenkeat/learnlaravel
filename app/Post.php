<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    // protected $table = 'posts';

    protected $dates = ['deleted_at'];
    
    //create data with mass assign, make column safe to create (Route::get('/create')
    protected $fillable = [
        'title',
        'content',
    ];
}
