@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('catalogs/create') }}" class="btn btn-primary pull-right">Create New Catalog</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th class="text-center">Total books</th>
                                <th class="text-center">Created at</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catalogs as $key => $catalog)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $catalog->name }}</td>
                                    <td class="text-center">{{ count($catalog->books) }}</td>
                                    <td class="text-center">{{ convert_date($catalog->created_at) }}</td>
                                    <td>
                                        <a href="{{ url('catalogs/' . $catalog->id . '/edit') }}"
                                            class="btn btn-info">Edit</a>
                                        <form action="{{ url('catalogs/' . $catalog->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure ?')" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

@endsection
