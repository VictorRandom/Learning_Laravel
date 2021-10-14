<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(empty($user)){
            return redirect()->route('login');
        }

        $posts = Post::get();

        return view('home')->with(compact('user', 'posts'));
    }

    public function createPost(Request $request)
    {
        Post::create($request->all());
    }
}
