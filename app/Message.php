<?php

namespace TheParadigmArticles;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function fromUser()
    {
        return $this->hasOne(User::class, 'id', 'from');
    }

}
