@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Blogs Index') }}</span>
                    <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-primary">{{ __('Create Blog') }}</a>
                </div>

                <div class="card-body">
                    {{-- Search, Filter & Sort form --}}
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

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Content') }}</th>
                                <th class="text-end">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ Str::limit($blog->content, 60) }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-sm btn-primary">{{ __('Show') }}</a>
                                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-success">{{ __('Edit') }}</a>
                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('{{ __('Are you sure you want to delete this blog?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        {{ request()->has('search') ? __('No blogs match your search.') : __('No blogs yet.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    @if($blogs->hasPages())
                        <div class="d-flex justify-content-center mt-3">
                            {{ $blogs->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
