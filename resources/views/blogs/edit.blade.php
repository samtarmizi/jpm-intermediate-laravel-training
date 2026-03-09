@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Blogs Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('blogs.update', $blog->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" class="form-control" name="title" required value="{{ $blog->title }}">
                        </div>
                        <div class="form-group">
                            <label for="content">{{ __('Content') }}</label>
                            <textarea class="form-control" name="content" required>{{ $blog->content }}</textarea>
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
