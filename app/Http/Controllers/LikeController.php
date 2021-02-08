<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function newLike($post_id){

        //get data user
        $user_id = Auth::user()->id;

        //condicion para saber si existe el like

        $exist_like = Like::where('user_id', $user_id)
                            ->where('post_id', $post_id)
                            ->exists();
        if($exist_like == 0){
            $like = new Like();
            $like->post_id = (int)$post_id;
            $like->user_id = $user_id;
            $like->save();
        }

        return redirect()->route('home');

    }
}
