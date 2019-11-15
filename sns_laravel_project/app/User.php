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

    public function posts() {
        return $this->hasMany('App\post');
    }

    public function comments () {
        return $this->hasMany('App\comment');
    }

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

    public function relationships() {
        return $this->belongsToMany(self::class, 'relationships', 'user_id', 'followed_user_id');
    }

    public function followed_relationships() {
        return $this->belongsToMany(self::class, 'relationships', 'followed_user_id', 'user_id');
    }
}
