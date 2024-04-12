@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 ps-3 pb-2 my-3 dashboard rounded-3">
            <div><h1>Hasil Polling</h1></div>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert" id="myAlert">
                {{session('success')}}
            </div>
        @endif

        @foreach($datas as $pol)
            <div class="card bg-light-subtle shadow border-0 rounded-3 ps-4 py-4 pe-5 mb-3">
                <p class="fw-semibold"> Periode Polling:
                    {{ \Carbon\Carbon::parse($pol->start_at)->format('d F Y') }}
                    - {{ \Carbon\Carbon::parse($pol->end_at)->format('d F Y') }}
                </p>
                <p class="fw-semibold">
                    Nomor Polling : {{$pol->id_polling}}
                </p>
                <div class="small col-lg-10">
                    <table class="table table-striped table-sm border rounded-3">
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
                                <td>{{$details->first()->id_mataKuliah}}
                                    - {{$details->first()->mataKuliah->nama_mataKuliah}}</td>
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
            </div>
        @endforeach
    </main>
@endsection
