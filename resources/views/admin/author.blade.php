@extends('layouts.admin')
@section('header', 'Author')
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
                <button @click="addData()" class="btn btn-primary pull-right">Create New
                    Author</button>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="authorTable">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Phone Number</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Created at</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-default" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form :action="actionUrl" method="POST" @submit="submitForm($event, data.id)">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-text="info + ' Author'"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf

                            <input type="hidden" name="_method" value="PUT" v-if="editStatus" />

                            <label for="name">Author Name : </label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" :value="data.name" required />
                            @error('name')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror

                            <label for="email" class="mt-3">Email : </label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" :value="data.email" required />
                            @error('email')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror

                            <label for="phone_number" class="mt-3">Phone Number : </label>
                            <input type="number" name="phone_number" id="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror" :value="data.phone_number"
                                required />
                            @error('phone_number')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror

                            <label for="address" class="mt-3">Address : </label>
                            <textarea name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror" required
                                :value="data.address"></textarea>
                            @error('address')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" v-text="info"></button>
                        </div>
                    </div>
                </form>
            </div>
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
        var actionUrl = '{{ url('authors') }}'
        var apiUrl = '{{ route('authors.api') }}'

        var columns = [{
                data: 'DT_RowIndex',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'name',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'email',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'phone_number',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'address',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'date',
                class: 'text-center',
                orderable: true
            },
            {
                render: function(index, row, data, meta) {
                    return `
                        <a href="#" class="btn btn-info" onclick="controller.editData(event, ${meta.row})">
                            Edit
                        </a>
                        <a href="#" class="btn btn-danger" onclick="controller.deleteData(event, ${data.id})">
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
                anggota: {},
                actionUrl,
                apiUrl,
                info: '',
                editStatus: false,
            },
            mounted: function() {
                this.datatable()
            },
            methods: {
                datatable() {
                    const _this = this
                    _this.table = $('#authorTable').DataTable({
                        ajax: {
                            url: _this.apiUrl,
                            type: 'GET'
                        },
                        columns
                    }).on('xhr', function() {
                        _this.datas = _this.table.ajax.json().data;
                    })
                },
                addData() {
                    this.editStatus = false;
                    this.info = 'Create';
                    this.data = {};
                    $('#modal-default').modal();
                },
                editData(event, row) {
                    this.data = this.datas[row];
                    this.editStatus = true;
                    this.info = 'Update';
                    $('#modal-default').modal();
                },
                deleteData(event, id) {
                    if (confirm("Are You Sure ?")) {
                        $(event.target).parents('tr').remove();
                        axios.post(this.actionUrl + '/' + id, {
                            _method: 'DELETE'
                        }).then(response => {
                            alert('Data has been removed')
                        });
                    }
                },
                submitForm(event, id) {
                    event.preventDefault()
                    const _this = this
                    var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id
                    axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                        $('#modal-default').modal('hide')
                        _this.table.ajax.reload()
                    })
                }
            }
        })
    </script>


@endsection
