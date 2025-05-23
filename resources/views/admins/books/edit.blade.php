@extends('layouts.admins.master')

@section('title', 'Update Books')


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">
                            <h2> Update Books</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Jangan lupa method PUT untuk update --}}

                    <div class="form-group">
                        <label for="formFile" class="form-label">Thumbnail</label>
                        <input class="form-control" type="file" name="avatar" id="formFile">
                        {{-- Kalau mau tampilkan preview thumbnail lama bisa tambah img tag di sini --}}
                        @if ($book->avatar)
                            <img src="{{ Storage::url($book->avatar) }}" alt="Thumbnail"
                                style="width: 100px; margin-top: 10px;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="title">Judul Buku</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Masukkan Judul buku" value="{{ old('title', $book->title) }}">
                    </div>

                    <div class="form-group">
                        <label for="author">Penulis Buku</label>
                        <input type="text" class="form-control" id="author" name="author"
                            placeholder="Enter penulis Buku" value="{{ old('author', $book->author) }}">
                    </div>

                    <div class="form-group">
                        <label for="publication_date" class="form-label">Tahun Terbit</label>
                        <input type="date" class="form-control" id="publication_date" name="publication_date"
                            value="{{ old('publication_date', $book->publication_date) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="categories">Kategori Buku</label>
                        <select name="categories[]" id="categories" class="form-control select2" multiple>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ collect(old('categories', $book->categories->pluck('id')))->contains($category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" disabled {{ old('status', $book->status) == null ? 'selected' : '' }}>
                                Pilih Status</option>
                            <option value="tersedia" {{ old('status', $book->status) == 'tersedia' ? 'selected' : '' }}>
                                Tersedia</option>
                            <option value="dipinjam" {{ old('status', $book->status) == 'dipinjam' ? 'selected' : '' }}>
                                Dipinjam</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('books.index') }}" class="btn btn-warning">Back</a>
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


            $('.select2').select2();
        });
    </script>
@endpush
