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
                <p class="fw-semibold">Polling Terbaru</p>
            </div>
            <div class="table-responsive small px-3">
                <table class="table table-striped table-sm mt-1">
                    <thead>
                    <tr>
                        <th scope="col">Nomor Polling</th>
                        <th scope="col">Periode</th>
                        <th scope="col">Nama Pengguna</th>
                        <th scope="col">Jumlah SKS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $pol)
                        <tr>
                            <td>{{$pol->polling->id_polling}}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($pol->polling->start_at)->format('Y-m-d') }}
                                - {{ \Carbon\Carbon::parse($pol->polling->end_at)->format('Y-m-d') }}
                            </td>
                            <td>{{$pol->users->nama_user}}</td>
                            {{--                        <td>{{$pol->where('id_mataKuliah', $pol->mataKuliah->id_mataKuliah)->sum('sks')}}</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
