<?php

namespace App;

use App\user;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'categroy_id', 'photo_id', 'title', 'body',
    ];

    public function user()
    {

        return $this->belongsTo('App\User');
    }
    public function photo()
    {

        return $this->belongsTo('App\Photo');
    }

}
