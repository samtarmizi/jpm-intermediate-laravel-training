@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Vehicle Details') }}</span>
                    <div>
                        <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-sm btn-success">{{ __('Edit') }}</a>
                        <a href="{{ route('vehicles.index') }}" class="btn btn-sm btn-secondary">{{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-3">{{ __('Make') }}</dt>
                        <dd class="col-sm-9">{{ $vehicle->make }}</dd>

                        <dt class="col-sm-3">{{ __('Model') }}</dt>
                        <dd class="col-sm-9">{{ $vehicle->model }}</dd>

                        <dt class="col-sm-3">{{ __('Year') }}</dt>
                        <dd class="col-sm-9">{{ $vehicle->year }}</dd>

                        <dt class="col-sm-3">{{ __('Color') }}</dt>
                        <dd class="col-sm-9">{{ $vehicle->color ?? '—' }}</dd>

                        <dt class="col-sm-3">{{ __('Plate number') }}</dt>
                        <dd class="col-sm-9">{{ $vehicle->plate_number }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
