<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BlogService;

class BlogController extends Controller
{
    public function __construct(
        protected BlogService $blogService
    ) {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = $this->blogService->getAll();

        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $this->blogService->create(
            $request->all(),
            $request->user()->id
        );

        return redirect()->route('blogs.index');
    }

    public function show(int $blog)
    {
        $blog = $this->blogService->find($blog);

        return view('blogs.show', compact('blog'));
    }

    public function edit(int $blog)
    {
        $blog = $this->blogService->find($blog);

        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, int $blog)
    {
        $this->blogService->update($blog, $request->all());

        return redirect()->route('blogs.index');
    }

    public function destroy(int $blog)
    {
        $this->blogService->delete($blog);

        return redirect()->route('blogs.index');
    }
}
