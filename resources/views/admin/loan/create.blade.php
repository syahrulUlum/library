@extends('layouts.admin')
@section('header', 'Create New Loan')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/select2/css/select2.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    Create New Loan
                </div>
                <div class="card-body">
                    <form action="{{ route('loans.store') }}" method="POST">
                        @csrf
                        <table width="100%">
                            <tr>
                                <td width="30%">
                                    <label for="member_id">Members Name : </label>
                                </td>
                                <td colspan="3">
                                    <select name="member_id" id="member_id" class="form-control select2bs4" required>
                                        @foreach ($members as $member)
                                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 10px"></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="date">Loan Date : </label>
                                </td>
                                <td>
                                    <input type="date" name="date_start" class="form-control" required />
                                </td>
                                <td align="center">-</td>
                                <td>
                                    <input type="date" name="date_end" class="form-control" required />
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 10px"></td>
                            </tr>
                            <tr>
                                <td width="30%">
                                    <label for="book_id">Book Name : </label>
                                </td>
                                <td colspan="3">
                                    <select class="select2" multiple="multiple" data-placeholder="Select Book Name"
                                        style="width: 100%;" name="books[]" required>
                                        @foreach ($books as $book)
                                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Select2 -->
    <script src="{{ asset('assets') }}/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endsection
