@extends('layouts.admins.master')

@section('title', 'Create Categories')


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">
                            <h2> Add New Categoies</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Category</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="enter  type">
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-warning">back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
