@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Vehicles') }}</span>
                    <a href="{{ route('vehicles.create') }}" class="btn btn-sm btn-primary">{{ __('Add Vehicle') }}</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form method="GET" action="{{ route('vehicles.index') }}" class="mb-4 p-3 bg-light rounded">
                        <div class="row g-2 align-items-end">
                            <div class="col-md-5">
                                <label for="search" class="form-label small text-muted">{{ __('Search') }}</label>
                                <input type="text" name="search" id="search" class="form-control form-control-sm"
                                    value="{{ request('search') }}" placeholder="{{ __('Make, model, plate, color...') }}">
                            </div>
                            <div class="col-md-2">
                                <label for="sort_by" class="form-label small text-muted">{{ __('Sort by') }}</label>
                                <select name="sort_by" id="sort_by" class="form-select form-select-sm">
                                    <option value="created_at" {{ request('sort_by', 'created_at') === 'created_at' ? 'selected' : '' }}>{{ __('Date') }}</option>
                                    <option value="make" {{ request('sort_by') === 'make' ? 'selected' : '' }}>{{ __('Make') }}</option>
                                    <option value="model" {{ request('sort_by') === 'model' ? 'selected' : '' }}>{{ __('Model') }}</option>
                                    <option value="year" {{ request('sort_by') === 'year' ? 'selected' : '' }}>{{ __('Year') }}</option>
                                    <option value="plate_number" {{ request('sort_by') === 'plate_number' ? 'selected' : '' }}>{{ __('Plate') }}</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="sort_dir" class="form-label small text-muted">{{ __('Order') }}</label>
                                <select name="sort_dir" id="sort_dir" class="form-select form-select-sm">
                                    <option value="desc" {{ request('sort_dir', 'desc') === 'desc' ? 'selected' : '' }}>{{ __('Desc') }}</option>
                                    <option value="asc" {{ request('sort_dir') === 'asc' ? 'selected' : '' }}>{{ __('Asc') }}</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-sm btn-primary w-100">{{ __('Apply') }}</button>
                            </div>
                        </div>
                        @if(request()->filled('search'))
                            <div class="mt-2">
                                <a href="{{ route('vehicles.index') }}" class="small text-muted">{{ __('Clear filters') }}</a>
                            </div>
                        @endif
                    </form>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>{{ __('Make') }}</th>
                                <th>{{ __('Model') }}</th>
                                <th>{{ __('Year') }}</th>
                                <th>{{ __('Color') }}</th>
                                <th>{{ __('Plate') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $vehicle->make }}</td>
                                    <td>{{ $vehicle->model }}</td>
                                    <td>{{ $vehicle->year }}</td>
                                    <td>{{ $vehicle->color ?? '—' }}</td>
                                    <td>{{ $vehicle->plate_number }}</td>
                                    <td>
                                        <a href="{{ route('vehicles.show', $vehicle) }}" class="btn btn-sm btn-primary">{{ __('Show') }}</a>
                                        <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-sm btn-success">{{ __('Edit') }}</a>
                                        <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('Are you sure you want to delete this vehicle?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">{{ __('No vehicles yet.') }} <a href="{{ route('vehicles.create') }}">{{ __('Add one') }}</a></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
