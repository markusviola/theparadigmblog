<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // For default attribute values
    protected $attributes = [
        'status' => 1,
        'isAdmin' => 0,
        'blogTitle' => 'Unnamed Blog',
        'blogDesc' =>  'Write your blog description...',
        'blogHeaderImg' => '',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'url',
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

    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getStatusAttribute($attribute){

        return $this->statusOptions()[$attribute];
    }

    public function getCreatedAtAttribute($attribute){

        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $attribute);
        return $date->format('F d, Y');
    }

    public function statusOptions() {

        return [
            1 => 'Active',
            0 => 'Inactive',
        ];
    }
}
