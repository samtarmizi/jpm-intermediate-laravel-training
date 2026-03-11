@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Vehicle') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('vehicles.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="make" class="form-label">{{ __('Make') }}</label>
                            <input type="text" class="form-control @error('make') is-invalid @enderror" name="make" id="make" value="{{ old('make') }}" required>
                            @error('make')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="model" class="form-label">{{ __('Model') }}</label>
                            <input type="text" class="form-control @error('model') is-invalid @enderror" name="model" id="model" value="{{ old('model') }}" required>
                            @error('model')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">{{ __('Year') }}</label>
                            <input type="number" class="form-control @error('year') is-invalid @enderror" name="year" id="year" value="{{ old('year') }}" min="1900" max="{{ date('Y') + 1 }}" required>
                            @error('year')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">{{ __('Color') }}</label>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" name="color" id="color" value="{{ old('color') }}">
                            @error('color')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="plate_number" class="form-label">{{ __('Plate number') }}</label>
                            <input type="text" class="form-control @error('plate_number') is-invalid @enderror" name="plate_number" id="plate_number" value="{{ old('plate_number') }}" required>
                            @error('plate_number')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
