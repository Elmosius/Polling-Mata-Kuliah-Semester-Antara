@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3 pt-3 pb-2 dashboard rounded-1">
            <div class="container d-flex justify-content-between align-items-center">
                <div>
                    <h1>Dashboard</h1>
                    <h5 class="ps-1">Hi! {{auth()->user()->nama_user}}, nice to see you again</h5>
                </div>
                <img class="dashboard-img p-3" src="{{asset('/img/awan.png')}}" alt="cloud">
            </div>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

        <div class="card bg-light-subtle shadow border-0 rounded-3">
            <div class="border-bottom ps-3 pt-3">
                <p class="fw-semibold">Um mau apa yak?</p>
            </div>
            <div class="table-responsive small px-3">
                <table class="table table-striped table-sm mt-1">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
