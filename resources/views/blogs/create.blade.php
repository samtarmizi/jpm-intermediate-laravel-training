@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Blogs Create') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" class="form-control" name="title" id="title" required value="{{ old('title') }}">
                            @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="content">{{ __('Content') }}</label>
                            <textarea class="form-control" name="content" id="content" required>{{ old('content') }}</textarea>
                            @error('content')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="attachment">{{ __('Attachment') }}</label>
                            <input type="file" class="form-control" name="attachment" id="attachment" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif,.webp">
                            <small class="text-muted">{{ __('Optional. Max 10MB. Allowed: PDF, Word, images.') }}</small>
                            @error('attachment')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
