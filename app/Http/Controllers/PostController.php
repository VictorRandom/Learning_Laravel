<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(empty($user)){
            return redirect()->route('login');
        }

        $posts = Post::get();

        foreach($posts as $post) {
           if ($post->belongsToMe()) {
               $post->can_edit = true;
           } else {
               $post->can_edit = false;
           }
        }

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

            $post_user = Post::find($id);
            $post_user_id = $post_user->user_id;

            if(empty($user_id)){
                return redirect('login');
            }

            if(! $post_user->belongsToMe()){ 
                return view('errors.internal-error');
            }
            
            $post = Post::findOrFail($id);

            return view('posts.edit')->with(compact('post', 'post_user_id'));
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

    public function store(StorePostRequest $request)
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
        try{
            $user_id = Auth::id();

            if(empty($user_id)){
                return redirect('login');
            }

            $post = Post::find($id);

            if (! $post->belongsToMe()) {
                return redirect()->back();
            }

            $post->delete();

            return redirect('home');
        }
        catch (\Exception $e){
            Log::info(json_encode($e->getMessage()));
            return redirect()->back(); 
        }
    }

    public function update($id, UpdatePostRequest $request)
    {
        try{
            $user_id = Auth::id();
            $title = $request->title;
            $description = $request->description;

            // if(empty($user_id)){
            //     return redirect('login');
            // }

            // if(empty($request->title)){
            //     return redirect()->back()->with('errors', 'O titulo n??o foi editado');
            // }

            // if (empty($request->description)){
            //     return redirect()->back()->with('errors', 'A descri????o n??o foi editada');
            // }

            $post = Post::find($id);

            if (! $post->belongsToMe()) {
                return redirect()->back();
            }

            $post->update([
                'title'=>$title, 
                'description'=>$description
            ]);
            
            return redirect('home'); 
        }
        catch (\Exception $e) {
            Log::info(json_encode($e->getMessage()));
            return redirect()->back(); 
        }
    }
}
