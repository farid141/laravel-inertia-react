<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all posts
        $posts = Post::latest()->get();

        //return view
        return inertia('Posts/Index', compact('posts'))->with('success', '');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Posts/Create')->with('success', '');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //set validation
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        //create post
        Post::create([
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        //redirect
        return redirect()->route('posts.index')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
