<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;

class BlogController extends Controller
{
    public function index()
    {
        // query all blogs
        $blogs = Blog::all();

        // return in json
        return response()->json([
            'status' => 'true',
            'message' => 'Success to retrieve all blogs',
            'data' => $blogs
        ]);
    }

    public function store(StoreBlogRequest $request)
    {
        Blog::create($request->all());

        return response()->json([
            'status' => 'true',
            'message' => 'Success to store blog',
        ]);
        
    }
}
