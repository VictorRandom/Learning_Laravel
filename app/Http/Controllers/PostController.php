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

        try{
            $user_id = Auth::id();

            if(empty($user_id)){
                return redirect('login');
            }
            
            $post = Post::findOrFail($id);

            return view('posts.edit')->with(compact('post'));
        }
            catch(\Exception $e) {
                Log::info(json_encode($e->getMessage()));
                return view('errors.internal-error'); 
        }
    }

    public function show($id)
    {
        try{
            $user_id = Auth::id();

            if(empty($user_id)){
                return redirect('login');
            }

            $show = Post::findOrFail($id);

            return view('posts.show')->with(compact('show'));
        }
        catch(\Exception $e) {
            Log::info(json_encode($e->getMessage()));
            return view('errors.not-found'); 
        }
    }

    public function store(Request $request)
    {
        try {
            $title = $request->title;
            $description = $request->description;
            $user_id = Auth::id();

            if(empty($user_id)){
                return redirect('login');
            }
            
            if(empty($title)){
                return redirect()->back()->with('errors', 'O titulo não foi digitado');
            }

            if(empty($description)){
                return redirect()->back()->with('errors', 'A descrição não foi digitada');
            }

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
        try{
            $user_id = Auth::id();

            if(empty($user_id)){
                return redirect('login');
            }
            Post::find($id)->delete();
            return redirect('home');
        }
        catch (\Exception $e){
            Log::info(json_encode($e->getMessage()));
            return redirect()->back(); 
        }
    }

    public function update($id, Request $request)
    {
        try{
            $user_id = Auth::id();

            if(empty($user_id)){
                return redirect('login');
            }

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
