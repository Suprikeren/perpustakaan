@extends('layouts.admins.master')

@section('title', 'Update Status')


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">
                            <h2> Update Status</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('loan-books.update', $loanBook) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="dipinjam" disabled
                                {{ old('status', $loanBook->status) == 'dipinjam' ? 'selected' : '' }}>
                                Dipinjam (status awal)
                            </option>
                            <option value="dikembalikan"
                                {{ old('status', $loanBook->status) == 'dikembalikan' ? 'selected' : '' }}>
                                Dikembalikan
                            </option>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-warning">back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
