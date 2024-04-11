@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">Dashboard</h3>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

        <div class="table-responsive small col-lg-6">
            <table class="table table-striped table-sm mt-2">
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
        <canvas class="my-4 w-100" id="myChart" width="900" height="500"></canvas>
    </main>
@endsection
