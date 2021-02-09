<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function save(Request $request){

        $user_id = Auth::user()->id;

        //Validation
        $validate = $this->validate($request, [
            'content'=> ['required', 'string', 'max:255'],
        ]);

        $content = $request->input('content');

        $post = new Post();
        $post->content = $content;
        $post->user_id = $user_id;

        $post->save();

        return redirect()->route('home')->with([
            'message'=>'Post was uploaded successfully'
        ]);
    }

    public function delete($post_id){

        $post = Post::find($post_id);

        //Eliminar likes
        $post->likes()->delete();

        //Eliminar comments
        $post->comments()->delete();

        //Eliminar post
        $post->delete();

        return redirect()->route('home')->with([
            'message'=>'Post deleted successfully'
        ]);
    }
}
