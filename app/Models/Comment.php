<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    //relacion muchos a uno
    public function user(){
        return $this->belongsTo('App\models\User', 'user_id');
    }

    //relacion muchos a uno
    public function post(){
        return $this->belongsTo('App\models\Post', 'post_id');
    }
}
