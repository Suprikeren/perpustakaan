@extends('layouts.admins.master')

@section('title', 'Categories')


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
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">
                            Add Data
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <td style="width: 10%">No</td>
                            <td style="width: 70%">Name</td>
                            <td style="width: 20%">actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                 <td>{{ $loop->iteration }}</td>

                                <td>{{ $category->name }}</td>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-info">Edit</a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
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
