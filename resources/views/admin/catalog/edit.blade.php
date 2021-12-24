@extends('layouts.admin')
@section('header', 'Update Catalog')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    Update Catalog
                </div>
                <div class="card-body">
                    <form action="{{ url('catalogs/' . $catalog->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <label for="name">Catalog Name : </label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ $catalog->name }}" required />
                        @error('name')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                        <button type="submit" class="btn btn-primary mt-4">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
