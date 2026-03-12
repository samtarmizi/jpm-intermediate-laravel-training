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
        $blogs = Blog::with('user')->get();

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

    public function show(Blog $blog)
    {
        $blog->load('user');

        return response()->json([
            'status' => true,
            'message' => 'Successfully retrieved a blog',
            'data' => $blog
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $blog->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Successfully update a blog',
            'data' => $blog
        ]);

    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return response()->json([
            'status' => true,
            'message' => 'Successfully deleted a blog',
            'data' => $blog
        ]);
    }
}
