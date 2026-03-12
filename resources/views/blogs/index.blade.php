@extends('admin.layouts.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Blog Index</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Blogs Index</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Blogs Index') }}</div>

                <div class="card-body">
                <form method="GET" action="{{ route('blogs.index') }}" class="mb-4 p-3 bg-light rounded">
                        <div class="row g-2 align-items-end">
                            <div class="col-md-4">
                                <label for="search" class="form-label small text-muted">{{ __('Search') }}</label>
                                <input type="text" name="search" id="search" class="form-control form-control-sm"
                                    value="{{ request('search') }}" placeholder="{{ __('Search title or content...') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="filter" class="form-label small text-muted">{{ __('Search in') }}</label>
                                <select name="filter" id="filter" class="form-select form-select-sm">
                                    <option value="all" {{ request('filter', 'all') === 'all' ? 'selected' : '' }}>{{ __('Title & Content') }}</option>
                                    <option value="title" {{ request('filter') === 'title' ? 'selected' : '' }}>{{ __('Title only') }}</option>
                                    <option value="content" {{ request('filter') === 'content' ? 'selected' : '' }}>{{ __('Content only') }}</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="sort_by" class="form-label small text-muted">{{ __('Sort by') }}</label>
                                <select name="sort_by" id="sort_by" class="form-select form-select-sm">
                                    <option value="created_at" {{ request('sort_by', 'created_at') === 'created_at' ? 'selected' : '' }}>{{ __('Date') }}</option>
                                    <option value="title" {{ request('sort_by') === 'title' ? 'selected' : '' }}>{{ __('Title') }}</option>
                                    <option value="updated_at" {{ request('sort_by') === 'updated_at' ? 'selected' : '' }}>{{ __('Updated') }}</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="sort_dir" class="form-label small text-muted">{{ __('Order') }}</label>
                                <select name="sort_dir" id="sort_dir" class="form-select form-select-sm">
                                    <option value="desc" {{ request('sort_dir', 'desc') === 'desc' ? 'selected' : '' }}>{{ __('Newest first') }}</option>
                                    <option value="asc" {{ request('sort_dir') === 'asc' ? 'selected' : '' }}>{{ __('Oldest first') }}</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-sm btn-primary w-100">{{ __('Apply') }}</button>
                            </div>
                        </div>
                        @if(request()->hasAny(['search', 'filter']) && request('filter') !== 'all')
                            <div class="mt-2">
                                <a href="{{ route('blogs.index') }}" class="small text-muted">{{ __('Clear filters') }}</a>
                            </div>
                        @endif
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->content }}</td>
                                    <td>{{ $blog->user->name }}</td>
                                    <td>
                                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">{{ __('Show') }}</a>
                                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-success">{{ __('Edit') }}</a>
                                        <form action="{{ route('blogs.destroy', $blog->id) }}" 
                                            method="POST" 
                                            onclick="return confirm('{{ __('Are you sure you want to delete this blog?') }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
