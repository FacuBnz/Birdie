<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Laravel\Ui\Presets\React;

class UserController extends Controller
{
    public function profile($user_id){

        $user = User::find($user_id);

        $posts = Post::orderBy('id','desc')
            ->where('user_id', $user_id)
            ->get();

        $all_posts = Post::orderBy('id', 'desc')->get();

        return view('user.profile', [
            'posts'=>$posts,
            'all_posts'=>$all_posts,
            'user'=>$user,
        ]);
    }

    public function config(){

        return view('user.config');
    }

    public function update(Request $request){

        //Get user identified
        $user = Auth::user();
        $id = Auth::user()->id;

        //form validation
        $validate = $this->validate($request, [

            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255', 'unique:users,nickname,'.$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id]
        ]);

        //get form data
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nickname = $request->input('nickname');
        $email = $request->input('email');

        //assign new data
        $user->name = $name;
        $user->surname = $surname;
        $user->nickname = $nickname;
        $user->email = $email;


        $image = $request->file('image');

        if($image){
            //assign unique name
            $image_full = time().$image->getClientOriginalName();

            //save to folder Storage
            Storage::disk('users')->put($image_full, File::get($image));

            //Set image
            $user->image = $image_full;
        }
        //Run Query
        $user->update();

        return redirect()->route('setting')->with([
            'message'=>'User updated successfully'
        ]);

    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);

        return new Response($file, 200);
    }

}
