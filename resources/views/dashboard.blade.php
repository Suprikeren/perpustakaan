@section('title', 'dashboard')
@extends('layouts.admins.master')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center p-4 bg-primary text-white rounded">
                    <div class="d-flex align-items-center">
                        {{-- <h2 class="mb-0">Welcome {{ Auth::user()->name }}</h2> --}}
                    </div>
                    <div class="text-end">
                        <h4 id="current_time"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-12 mb-4">
            <div class="card bg-warning shadow-lg border-0 h-100">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-users fa-2x me-3">
                            <h3 class="text-end">
                                {{-- {{ App\Models\Employe::count() ?? '0' }} --}}
                            </h3>
                            <h3 class="card-text">
                                Employess
                            </h3>
                        </i>
                    </div>
                </div>
            </div>
        </div>


        {{--  --}}
        <div class="col-lg-6 col-md-6 col-12 mb-4">
            <div class="card bg-primary shadow-lg border-0 h-100">
                <div class="card-body text-white">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-users fa-2x me-3">
                            <h3 class="text-end">
                                {{-- {{ App\Models\User::count() ?? '0' }} --}}
                            </h3>
                            <h3 class="card-text">
                                Users
                            </h3>
                        </i>
                    </div>
                </div>
            </div>

    </div>

    @push('script')
        <script>
            function updateTime() {
                const currentDate = new Date();
                const hours = currentDate.getHours().toString().padStart(2, '0');
                const minutes = currentDate.getMinutes().toString().padStart(2, '0');
                const seconds = currentDate.getSeconds().toString().padStart(2, '0');
                const currentTime = `${hours} : ${minutes} : ${seconds}`;
                document.getElementById('current_time').textContent = currentTime;
            }
            setInterval(updateTime, 1000);
            updateTime();
        </script>
    @endpush

@endsection
