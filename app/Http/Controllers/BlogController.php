<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\StoreBlogRequest;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // $blogs = \App\Models\Blog::all();

        // query 'search' Blog::model
        // $blogs = \App\Models\Blog::where('title', 'LIKE', '%'.$request->search.'%')
        //             ->orWhere('content', 'LIKE', '%'.$request->search.'%')
        //             ->orderBy('created_at', 'desc')
        //             ->get();

        // $query = \App\Models\Blog::query();
        $user = auth()->user();
        $query = $user->blogs();

        // Only add search conditions when the user has typed something in the search box
        $query->when($request->filled('search'), function ($query) use ($request) {
            $searchTerm = '%' . $request->search . '%';

            if ($request->filter === 'title') {
                $query->where('title', 'like', $searchTerm);
            } elseif ($request->filter === 'content') {
                $query->where('content', 'like', $searchTerm);
            } else {
                // Search in both title and content
                $query->where(function ($query) use ($searchTerm) {
                    $query->where('title', 'like', $searchTerm)
                        ->orWhere('content', 'like', $searchTerm);
                });
            }
        });

        // Sort: only allow known columns to avoid SQL issues
        $sortColumn = $request->get('sort_by', 'created_at');
        $sortDirection = strtolower($request->get('sort_dir', 'desc')) === 'asc' ? 'asc' : 'desc';
        $allowedSortColumns = ['title', 'created_at', 'updated_at'];

        if (in_array($sortColumn, $allowedSortColumns)) {
            $query->orderBy($sortColumn, $sortDirection);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $blogs = $query->paginate(5);

        return view('blogs.index', compact('blogs')); // resources/views/blogs/index.blade.php + $blogs
    }

    public function create()
    {
        return view('blogs.create'); // resources/views/blogs/create.blade.php
    }

    public function store(StoreBlogRequest $request)
    {   
        // POPO - Plain Old PHP Object
        $blog = new \App\Models\Blog();

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = auth()->user()->id;

        // if ($request->hasFile('attachment')) {
        //     $file = $request->file('attachment');
        //     $name = Str::random(40) . '.' . ($file->getClientOriginalExtension() ?: 'bin');
        //     $path = Storage::disk('public')->putFileAs('blog-attachments', $file, $name);
        //     if ($path !== false && $path !== '') {
        //         $blog->attachment = $path;
        //     }
        // }

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
