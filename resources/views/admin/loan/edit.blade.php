@extends('layouts.admin')
@section('header', 'Update Loan')
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
                    Update Loan
                </div>
                <div class="card-body">
                    <form action="{{ route('loans.update', $transactions->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <table width="100%">
                            <tr>
                                <td width="30%">
                                    <label for="member_id">Members Name : </label>
                                </td>
                                <td colspan="3">
                                    <select name="member_id" id="member_id" class="form-control select2bs4" required>
                                        @foreach ($members as $member)
                                            <option value="{{ $member->id }}" @if ($member->id == $transactions->member->id)
                                                selected
                                        @endif>{{ $member->name }}</option>
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
                                    <input type="date" name="date_start" class="form-control"
                                        value="{{ $transactions->date_start }}" required />
                                </td>
                                <td align="center">-</td>
                                <td>
                                    <input type="date" name="date_end" class="form-control"
                                        value="{{ $transactions->date_end }}" required />
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
                                            <option value="{{ $book->id }}" @if (in_array($book->title, $booksNow))
                                                selected
                                        @endif>{{ $book->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 10px"></td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Status : </label>
                                </td>
                                <td>
                                    <input type="radio" name="status" value="returned" id="status1" @if ($transactions->status == 1)
                                    checked
                                    @endif/> <label for="status1"> Has been
                                        returned</label>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="radio" name="status" value="not_returned" id="status2" @if ($transactions->status == 0 || $transactions->status == 2)
                                    checked
                                    @endif/> <label for="status2"> Not been
                                        returned</label>
                                </td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary mt-4">Update</button>
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
