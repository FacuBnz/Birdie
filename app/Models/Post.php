<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $table = 'posts';

    //relacion uno a muchos
    public function comments(){
        return $this->hasMany('App\models\Comment');
    }

    //relacion uno a muchos
    public function likes(){
        return $this->hasMany('App\models\Like');
    }

    //relacion muchos a uno
    public function user(){
        return $this->belongsTo('App\models\User', 'user_id');
    }
}
