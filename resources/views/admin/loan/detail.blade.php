@extends('layouts.admin')
@section('header', 'Details Loan')
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
                    Details Loan
                </div>
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td width="30%">
                                <label>Members Name</label>
                            </td>
                            <td>
                                <label> : </label>
                            </td>
                            <td>
                                {{ $transactions->member->name }}
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 10px"></td>
                        </tr>
                        <tr>
                            <td>
                                <label>Loan Date</label>
                            </td>
                            <td>
                                <label> : </label>
                            </td>
                            <td>
                                {{ convert_date($transactions->date_start) }}
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 10px"></td>
                        </tr>
                        <tr>
                            <td width="30%" valign="top">
                                <label>Book Name</label>
                            </td>
                            <td valign="top">
                                <label> : </label>
                            </td>
                            <td>
                                @foreach ($books as $book)
                                    <p>{{ $book }}</p>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td width="30%">
                                <label>Status</label>
                            </td>
                            <td>
                                <label> : </label>
                            </td>
                            <td>
                                @switch($transactions->status)
                                    @case(0)
                                        Not Returned
                                    @break
                                    @case(1)
                                        Finished
                                    @break
                                    @default
                                        Late
                                @endswitch
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
