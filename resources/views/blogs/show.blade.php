@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Blogs Show') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" class="form-control" name="title" value="{{ $blog->title }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="content">{{ __('Content') }}</label>
                        <textarea class="form-control" name="content" readonly>{{ $blog->content }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
