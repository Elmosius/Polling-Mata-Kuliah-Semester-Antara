@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">Hasil Polling {{$datas->first()->polling->id_polling}} -
                {{$datas->first()->mataKuliah->nama_mataKuliah}}</h3>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

        <div class="table-responsive small col-lg-10">
            <table class="table table-striped table-sm mt-2">
                <thead>
                <tr>
                    <th scope="col">Waktu polling </th>
                    <th scope="col">User</th>
                    <th scope="col">Kode - Nama Program Studi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datas as $data)
                    <tr>
                        <td>
                            {{$data->created_at}}
                        </td>
                        <td>
                            {{$data->users->nama_user}}
                        </td>
                        <td>
                            {{$data->users->id_program_studi ?? '-'}}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <canvas class="my-4 w-100" id="myChart" width="900" height="500"></canvas>
    </main>
@endsection
