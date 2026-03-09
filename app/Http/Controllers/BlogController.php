<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Start with the base query for all blogs
        $query = Blog::query();

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

        // Get paginated results and keep search/sort params in pagination links
        $blogs = $query->paginate(10)->withQueryString();

        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create'); // resources/views/blogs/create.blade.php
    }

    public function store(Request $request)
    {
        // POPO - Plain Old PHP Object
        $blog = new Blog();

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = auth()->user()->id;
        $blog->save();
        return redirect()->route('blogs.index');
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return view('blogs.show', compact('blog')); // resources/views/blogs/show.blade.php + $blog
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blogs.edit', compact('blog')); // resources/views/blogs/edit.blade.php + $blog
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();
        return redirect()->route('blogs.index');
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs.index');
    }
}
