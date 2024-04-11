@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">Hasil Polling</h3>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert" id="myAlert">
                {{session('success')}}
            </div>
        @endif

        @foreach($datas as $pol)
            <p> Periode Polling:
                {{ \Carbon\Carbon::parse($pol->start_at)->format('d F Y') }}
                - {{ \Carbon\Carbon::parse($pol->end_at)->format('d F Y') }}
            </p>
            <p>
                Nomor Polling : {{$pol->id_polling}}
            </p>
            <div class="table-responsive small col-lg-10 mb-4">
                <table class="table table-striped table-sm ">
                    <thead>
                    <tr>
                        <th scope="col">Kode Mata Kuliah - Nama Mata Kuliah</th>
                        <th scope="col">Kode - Nama Program Studi</th>
                        <th scope="col">Total Mahasiswa yang memilih</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($pol->pollingDetail->groupBy('id_mataKuliah') as $id_mataKuliah => $details)
                        <tr>
                            <td>{{$details->first()->id_mataKuliah}} - {{$details->first()->mataKuliah->nama_mataKuliah}}</td>
                            <td>{{$details->first()->mataKuliah->id_program_studi}}
                                - {{$details->first()->mataKuliah->programStudi->nama_program_studi}}</td>
                            <td>{{ $details->count() }}</td>
                            <td>
                                <a href="/dashboard/polling-detail-hasil/{{$pol->id_polling}}/{{$details->first()->id_mataKuliah}}"
                                   class="text-decoration-none badge bg-dark ms-1">
                                    <i class="bi bi-box-arrow-up-right"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        @endforeach
        <canvas class="my-4 w-100" id="myChart" width="900" height="500"></canvas>
    </main>
@endsection
