<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function save(Request $request){
        $user_id = Auth::user()->id;

        //Validation
        $validate = $this->validate($request, [
            'comment'=> ['required', 'string', 'max:255'],
            'post_id'=>['required', 'int'],
        ]);
        $commentary = $request->input('comment');
        $post_id = $request->input('post_id');

        $comment = new Comment();
        $comment->comment = $commentary;
        $comment->user_id = $user_id;
        $comment->post_id = $post_id;

        $comment->save();

        return redirect()->route('home')->with([
            'message'=>'Comment was uploaded successfully'
        ]);
    }
}
