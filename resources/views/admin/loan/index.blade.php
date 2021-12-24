@extends('layouts.admin')
@section('header', 'Loans')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
    <div id="controller">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-7">
                        <a href="{{ route('loans.create') }}" class="btn btn-primary pull-right">Create New
                            Loan</a>
                    </div>
                    <div class="col-md-2">
                        <select name="loan_status" class="form-control">
                            <option value="all">All Status</option>
                            <option value="in_progress">In Progress</option>
                            <option value="finished">Finished</option>
                            <option value="late">Late</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="loan_date" class="form-control">
                            <option value="all">All Loan Date</option>
                            @foreach ($loan_dates as $loan_date)
                                <option value="{{ $loan_date->date_start }}">
                                    {{ convert_date($loan_date->date_start) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="loansTable">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Loan Date</th>
                            <th>Date of Return</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Length of Loan (day)</th>
                            <th class="text-center">Total Books</th>
                            <th class="text-center">Total Pay</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </div>
@endsection
@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        var actionUrl = '{{ url('loans') }}'
        var apiUrl = '{{ route('loans.api') }}'

        var columns = [{
                data: 'DT_RowIndex',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'convert_date_start',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'convert_date_end',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'name',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'long',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'total_transaction',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'total_price',
                class: 'text-center',
                orderable: true
            },
            {
                render: function(index, row, data, meta) {
                    if (data['status'] == 0) {
                        return '<p class="bg-info">In Progress</p>'
                    } else if (data['status'] == 1) {
                        return '<p class="bg-success">Finished</p>'
                    } else {
                        return '<p class="bg-danger">Late</p>'
                    }

                },
                orderable: false,
                width: '200px',
                class: 'text-center'
            },
            {
                render: function(index, row, data, meta) {
                    return `
                        <a href="/loans/${data['id']}" class="btn btn-success"">
                            Detail
                        </a>
                        <a href="/loans/${data['id']}/edit" class="btn btn-info"">
                            Edit
                        </a>
                        <a href="{{ url('loans/delete') }}/${data['id']}" onclick="return confirm('Are you sure ?')" class="btn btn-danger">
                            Delete
                        </a>
                `
                },
                orderable: false,
                width: '200px',
                class: 'text-center'
            }
        ]

        var controller = new Vue({
            el: '#controller',
            data: {
                datas: [],
                data: {},
                actionUrl,
                apiUrl,
                editStatus: false,
            },
            mounted: function() {
                this.datatable()
            },
            methods: {
                datatable() {
                    const _this = this
                    _this.table = $('#loansTable').DataTable({
                        ajax: {
                            url: _this.apiUrl,
                            type: 'GET'
                        },
                        columns
                    }).on('xhr', function() {
                        _this.datas = _this.table.ajax.json().data;
                    })
                }
            }
        })
    </script>
    <script>
        $('select[name=loan_status], select[name=loan_date]').on('change', function() {
            loan_status = $('select[name=loan_status]').val()
            loan_date = $('select[name=loan_date]').val()
            if (loan_status == 'all' && loan_date == 'all') {
                controller.table.ajax.url(apiUrl).load()
            } else {
                controller.table.ajax.url(apiUrl + '?loan_status=' + loan_status + '&loan_date=' + loan_date).load()
            }
        })
    </script>


@endsection
