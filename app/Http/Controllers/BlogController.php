<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = \App\Models\Blog::all();
        return view('blogs.index', compact('blogs')); // resources/views/blogs/index.blade.php + $blogs
    }

    public function create()
    {
        return view('blogs.create'); // resources/views/blogs/create.blade.php
    }
}
