@extends('layouts.admins.master')

@section('title', 'Books')


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">
                            Employes
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('books.create') }}" class="btn btn-primary">
                            Add Data
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <td style="width: 5%">No</td>
                            <td style="width: 10%">thumbnail</td>
                            <td style="width: 10%">Judul Buku</td>
                            <td style="width: 10%">Penulis Buku</td>
                            <td style="width: 15%">Tahun Terbit</td>
                            <td style="width: 15%">Nomor Unik</td>
                            <td style="width: 10%">Category Buku</td>
                            <td style="width: 15%">Status</td>
                            <td style="width: 10%">actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                 <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ Storage::url($book->avatar) }}" alt="thumbnail" class="img-thumbnail" style="width: 80px; height: auto;">
                                </td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->publication_date }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->categories->pluck('name')->join(', ') }}</td>
                                <td>{{ $book->status }}</td>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        <a href="{{ route('books.edit', $book->id) }}"
                                            class="btn btn-info">Edit</a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure want to delete this data?')"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


