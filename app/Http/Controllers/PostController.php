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
        $post = Post::find($id);

        return view('posts.edit')->with(compact('post'));
    }

    public function show($id)
    {
        
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
        Post::find($id)->delete();
        return redirect('home');
    }

    public function update($id, Request $request)
    {
        try{
            if(empty($request->title)){
                return redirect()->back()->with('errors', 'O titulo não foi editado');
            }
            if (empty($request->description)){
                return redirect()->back()->with('errors', 'A descrição não foi editada');
            }

            Post::find($id)->update(['title'=>$request->title, 'description'=>$request->description]);
            
            return redirect('home'); 
        }
        catch (\Exception $e) {
            Log::info(json_encode($e->getMessage()));
            return redirect()->back(); 
        }
    }



}
