<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($attribute){

        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $attribute);
        return $date->format('F d, Y');
    }

    public function getUpdatedAtAttribute($attribute){

        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $attribute);
        return $date->format('F d, Y');
    }
}
