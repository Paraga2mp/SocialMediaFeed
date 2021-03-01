<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \App\Models\Post::all()->sortByDesc('created_at'); 
       
        //dd($posts);

        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $posts = Post::orderBy('title')->get();
       
        // $roles = Role::pluck('name','name')->all();
        return view('posts.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= request()->validate([
            'title' => 'required',
            'image_url' => 'required',
            'caption',
        ]);
    
        //dd(auth()->user()->posts());
        auth()->user()->posts()->create($data);
    
            return redirect()->route('home');
                       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with([
            'post'=>$post,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */ 
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'image_url' => 'required',
            'caption',
        ]);


        $post->title = $request->title;
        $post->image_url = $request->image_url;
        $post->caption = $request->caption;
        $post->save();
    
        return redirect()->route('home')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       // $user = User::find($id);

        if($post->id != 1)
        {
            $post->delete();
        }
        else
        {
            session()->flash('status', 'Unable to delete the record');
        }

        return redirect('home');
    }
    
}
