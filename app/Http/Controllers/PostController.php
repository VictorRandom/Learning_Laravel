<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\Log;


class PostController extends Controller
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

    public function create()
    {
        return view('posts.create');
    }

    public function edit($id)
    {

    }

    public function show($id)
    {
        //$show = Post::where(["id"=>$id])->select(["id", "title", "description"])->first();
        
        $show = Post::find($id);

        return view('posts.show')->with(compact('show'));
    }

    public function store(Request $request)
    {
        try {
            $title = $request->title;
            $description = $request->description;
            $user_id = Auth::id();

            Post::create([
                'title' => $title,
                'description' => $description,
                'user_id' => $user_id
            ]);   
            
            return redirect('home');
        } catch (\Exception $e) {
            Log::info(json_encode($e->getMessage()));
            return redirect()->back(); 
        }
    }

    public function destroy($id) 
    {

    }

    public function update($id, Request $request)
    {
        
    }



}
