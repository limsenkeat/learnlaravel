<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    // protected $table = 'posts';

    protected $dates = ['deleted_at'];

    public $directory = "/images/";
    
    //create data with mass assign, make column safe to create (Route::get('/create')
    protected $fillable = [
        'title',
        'content',
        'path'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function photos(){
        
        return $this->morphMany('App\Photo', 'imageable');
    }
    
    public function tags(){
        
        return $this->morphToMany('App\Tag', 'taggable');
    }


    //query scope (scopeXXX)
    public function scopeIdFirst($query){

        return $query->orderBy('id', 'asc');
    }
    
    public function getPathAttribute($value){

        return $this->directory . $value;
    }
}
