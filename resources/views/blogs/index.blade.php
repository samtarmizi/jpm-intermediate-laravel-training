@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Blogs Index') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Content') }}</th>
                                <th>{{ __('Attachment') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ Str::limit($blog->content, 50) }}</td>
                                    <td>
                                        @if($blog->attachment)
                                            <a href="{{ asset('storage/' . $blog->attachment) }}" target="_blank" rel="noopener" class="btn btn-sm btn-outline-primary">
                                                {{ __('View') }}
                                            </a>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
