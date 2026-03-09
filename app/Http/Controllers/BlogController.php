<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = \App\Models\Blog::all();
        return view('blogs.index', compact('blogs')); // resources/views/blogs/index.blade.php + $blogs
    }

    public function create()
    {
        return view('blogs.create'); // resources/views/blogs/create.blade.php
    }

    public function store(Request $request)
    {
        // POPO - Plain Old PHP Object
        $blog = new \App\Models\Blog();

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = auth()->user()->id;
        $blog->save();
        return redirect()->route('blogs.index');
    }

    public function show($id)
    {
        $blog = \App\Models\Blog::find($id);
        return view('blogs.show', compact('blog')); // resources/views/blogs/show.blade.php + $blog
    }

    public function edit($id)
    {
        $blog = \App\Models\Blog::find($id);
        return view('blogs.edit', compact('blog')); // resources/views/blogs/edit.blade.php + $blog
    }

    public function update(Request $request, $id)
    {
        $blog = \App\Models\Blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();
        return redirect()->route('blogs.index');
    }

    public function destroy($id)
    {
        $blog = \App\Models\Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs.index');
    }
}
