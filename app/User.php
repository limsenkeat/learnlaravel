<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function post(){

        return $this->hasOne('App\Post');

    }

    public function posts(){

        return $this->hasMany('App\Post');
        
    }

    public function roles(){

        //for customize table name and key column
        // return $this->belongsToMany('App\Role'， 'user_role', 'user_id', 'role_id');

        return $this->belongsToMany('App\Role');
        // return $this->belongsToMany('App\Role')->withPivot('created_at'); //to allow access Intermediate table column
    }

    public function photos(){
        
        return $this->morphMany('App\Photo', 'imageable');
    }

    //Accessors
    public function getNameAttribute($value){

        return strtoupper($value);
    }

    //Mutators
    public function setNameAttribute($value){

        $this->attributes['name'] =  strtoupper($value);
    }

    public function isAdmin(){
        
        if($this->roles){
            foreach($this->roles as $role){
                if($role->id == 1){ //administrator
                    return true;
                }
            }
        }
        return false;
    }
}
