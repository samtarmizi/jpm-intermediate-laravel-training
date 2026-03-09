@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Blogs Show') }}</div>

                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" class="form-control" id="title" value="{{ $blog->title }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="content">{{ __('Content') }}</label>
                        <textarea class="form-control" id="content" readonly>{{ $blog->content }}</textarea>
                    </div>
                    @if($blog->attachment)
                        <div class="form-group mb-3">
                            <label>{{ __('Attachment') }}</label>
                            <div>
                                @php
                                    $ext = strtolower(pathinfo($blog->attachment, PATHINFO_EXTENSION));
                                    $isImage = in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                @endphp
                                @if($isImage)
                                    <a href="{{ asset('storage/' . $blog->attachment) }}" target="_blank" rel="noopener">
                                        <img src="{{ asset('storage/' . $blog->attachment) }}" alt="{{ __('Attachment') }}" class="img-fluid rounded border" style="max-height: 300px;">
                                    </a>
                                @endif
                                <p class="mt-2 mb-0">
                                    <a href="{{ asset('storage/' . $blog->attachment) }}" target="_blank" rel="noopener" class="btn btn-outline-secondary btn-sm">
                                        {{ $isImage ? __('View full size') : __('Download') }} — {{ basename($blog->attachment) }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
