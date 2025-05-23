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
                    {{-- <div class="col-md-6 d-flex justify-content-end">
                        <a href="#" class="btn btn-primary">
                            Add Data
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <td style="width: 5%">No</td>
                            <td style="width: 10%">anggota</td>
                            <td style="width: 10%">Judul Buku</td>
                            <td style="width: 10%">waktu Peminjaman</td>
                            <td style="width: 15%">Waktu Pengembalian</td>
                            <td style="width: 20%">Batas Waktu</td>
                            <td style="width: 15%">Status</td>
                            <td style="width: 10%">Denda</td>
                            <td style="width: 5%">actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loanBooks as $loan)
                            <tr>
                                 <td>{{ $loop->iteration }}</td>
                                <td>
                                   {{ $loan->user->name }}
                                </td>
                                <td>{{ $loan->book->title }}</td>
                                <td>{{ $loan->loan_date }}</td>
                                <td>{{ $loan->return_date }}</td>
                                <td>
                                   {{ $loan->status_waktu }}
                                </td>
                                <td>{{ $loan->status }}</td>
                                <td>{{ $loan->late_charge }}</td>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                       @if($loan->status !== 'dikembalikan')
                                         <a href="{{ route('loan-books.edit', $loan->id) }}"
                                            class="btn btn-info">update status</a>
                                       @endif
                                        {{-- <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure want to delete this data?')"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form> --}}
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


