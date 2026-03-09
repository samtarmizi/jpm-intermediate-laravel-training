<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(
        protected BlogService $blogService
    ) {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = $this->blogService->getAllBlogs();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $this->blogService->createBlog(
            $request->only(['title', 'content']),
            auth()->id()
        );
        return redirect()->route('blogs.index');
    }

    public function show($id)
    {
        $blog = $this->blogService->getBlogById((int) $id);
        if (!$blog) {
            abort(404);
        }
        return view('blogs.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = $this->blogService->getBlogById((int) $id);
        if (!$blog) {
            abort(404);
        }
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = $this->blogService->updateBlog((int) $id, $request->only(['title', 'content']));
        if (!$blog) {
            abort(404);
        }
        return redirect()->route('blogs.index');
    }

    public function destroy($id)
    {
        if (!$this->blogService->deleteBlog((int) $id)) {
            abort(404);
        }
        return redirect()->route('blogs.index');
    }
}
