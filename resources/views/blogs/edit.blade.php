@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Blogs Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('blogs.update', $blog->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" class="form-control" name="title" id="title" required value="{{ old('title', $blog->title) }}">
                            @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="content">{{ __('Content') }}</label>
                            <textarea class="form-control" name="content" id="content" required>{{ old('content', $blog->content) }}</textarea>
                            @error('content')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="attachment">{{ __('Attachment') }}</label>
                            @if($blog->attachment)
                                <div class="mb-2">
                                    <span class="text-muted">{{ __('Current:') }}</span>
                                    <a href="{{ asset('storage/' . $blog->attachment) }}" target="_blank" rel="noopener">{{ basename($blog->attachment) }}</a>
                                </div>
                            @endif
                            <input type="file" class="form-control" name="attachment" id="attachment" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif,.webp">
                            <small class="text-muted">{{ __('Optional. Max 10MB. Leave empty to keep current file.') }}</small>
                            @error('attachment')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
