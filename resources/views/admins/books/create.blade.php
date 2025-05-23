@extends('layouts.admins.master')

@section('title', 'Create Books')


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">
                            <h2> Add New Books</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="formFile" class="form-label">Thumbnail</label>
                        <input class="form-control" type="file" name="avatar" id="formFile">
                    </div>
                    <div class="form-group">
                        <label for="title">Judul Buku</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Masukkan Judul buku">
                    </div>
                    <div class="form-group">
                        <label for="title">Penulis Buku</label>
                        <input type="author" class="form-control" id="author" name="author"
                            placeholder="enter penulis Buku">
                    </div>
                    <div class="form-group">
                        <label for="publication_date" class="form-label">Tahun Terbit</label>
                        <input type="date" class="form-control" id="publication_date" name="publication_date" required>
                    </div>
                    <div class="form-group">
                        <label for="categories">Kategori Buku</label>
                        <select name="categories[]" id="categories" class="form-control select2" multiple>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="#" selected>Pilih Status</option>
                            <option value="tersedia">Tersedia</option>
                            <option value="dipinjam">Dipinjam</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Add</button>
                    <a href="{{ route('books.index') }}" class="btn btn-warning">back</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('script')
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Pilih kategori buku",
                allowClear: true
            });

            // $('.select2').select2();
        });
    </script>
@endpush
