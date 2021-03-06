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
        'name', 'email', 'password','id_role','dni','pais','genero','edad'
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

    public function role(){
        return $this->belongsTo('App\Role', 'id_role');
    }

    public function isAdmin(){
        $rol = $this->role;
        if($rol->name == 'root'){
            return true;
        }
        else{
            return false;
        }
    }

    public function isAdmin2(){
        $rol = $this->role;
        if($rol->name == 'admin'){
            return true;
        }
        else{
            return false;
        }
    }

    public function posts()

    {
        return $this->hasMany(Post::class);
    }
}
