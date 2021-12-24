@extends('layouts.admin')
@section('header', 'Create New Catalog')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    Create New Catalog
                </div>
                <div class="card-body">
                    <form action="{{ url('catalogs') }}" method="POST">
                        @csrf
                        <label for="name">Catalog Name : </label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required />
                        @error('name')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                        <button type="submit" class="btn btn-primary mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
