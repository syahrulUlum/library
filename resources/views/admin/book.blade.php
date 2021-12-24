@extends('layouts.admin')
@section('header', 'Book')

@section('content')
    <div id="controller">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search from title" autocomplete="off"
                        v-model="search" />
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary" @click="addData()">Create New Book</button>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12" v-for="book in filteredList">
                <div class="info-box" @click="editData(book)">
                    <div class="info-box-content">
                        <span class="info-box-text h4">
                            @{{ book . title }} (@{{ book . qty }})
                        </span>
                        <span class="info-box-number">Rp. @{{ numberWithSpaces(book . price) }},-</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-default" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form :action="actionUrl" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-text="info + ' Book'"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus" />

                            <label for="isbn">ISBN : </label>
                            <input type="number" name="isbn" id="isbn"
                                class="form-control @error('isbn') is-invalid @enderror" :value="book.isbn" required />
                            @error('isbn')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror

                            <label for="title" class="mt-3">Title : </label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" :value="book.title" required />
                            @error('title')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror

                            <label for="year" class="mt-3">Year : </label>
                            <input type="number" name="year" id="year"
                                class="form-control @error('year') is-invalid @enderror" :value="book.year" required />
                            @error('year')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror

                            <label for="publisher_id">Publisher</label>
                            <select name="publisher_id" id="publisher_id" class="form-control">
                                @foreach ($publishers as $publisher)
                                    <option :selected="book.publisher_id == {{ $publisher->id }}"
                                        value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                            @error('publisher_id')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror

                            <label for="author_id">Author</label>
                            <select name="author_id" id="author_id" class="form-control">
                                @foreach ($authors as $author)
                                    <option :selected="book.author_id == {{ $author->id }}" value="{{ $author->id }}">
                                        {{ $author->name }}</option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror

                            <label for="catalog_id">Catalog</label>
                            <select name="catalog_id" id="catalog_id" class="form-control">
                                @foreach ($catalogs as $catalog)
                                    <option :selected="book.catalog_id == {{ $catalog->id }}"
                                        value="{{ $catalog->id }}">
                                        {{ $catalog->name }}</option>
                                @endforeach
                            </select>
                            @error('catalog_id')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror

                            <label for="qty" class="mt-3">Total Qty : </label>
                            <input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror"
                                :value="book.qty" required />
                            @error('qty')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror

                            <label for="price" class="mt-3">Price : </label>
                            <input type="number" name="price" id="price"
                                class="form-control @error('price') is-invalid @enderror" :value="book.price" required />
                            @error('price')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal" @click="deleteData(book.id)"
                                v-if="editStatus">Delete</button>
                            <button type="submit" class="btn btn-primary" v-text="info"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
@section('js')
    <script>
        var actionUrl = '{{ url('books') }}'
        var apiUrl = '{{ route('books.api') }}'

        var app = new Vue({
            el: '#controller',
            data: {
                books: [],
                search: '',
                info: '',
                editStatus: false,
                book: {},
                actionUrl
            },
            mounted: function() {
                this.get_books()
            },
            methods: {
                get_books() {
                    const _this = this
                    $.ajax({
                        url: apiUrl,
                        method: 'GET',
                        success: function(data) {
                            _this.books = JSON.parse(data)
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    })
                },
                addData() {
                    this.book = {};
                    this.info = 'Create';
                    this.actionUrl = '{{ url('books') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(book) {
                    this.book = book;
                    this.info = 'Update';
                    this.actionUrl = '{{ url('books') }}' + '/' + book.id;
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('books') }}' + '/' + id;
                    if (confirm("Are you sure?")) {
                        axios.post(this.actionUrl, {
                            _method: 'DELETE'
                        }).then(response => {
                            location.reload();
                        });
                    }
                },
                numberWithSpaces(x) {
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                }
            },
            computed: {
                filteredList() {
                    return this.books.filter(book => {
                        return book.title.toLowerCase().includes(this.search.toLowerCase())
                    })
                }

            }
        })
    </script>
@endsection
