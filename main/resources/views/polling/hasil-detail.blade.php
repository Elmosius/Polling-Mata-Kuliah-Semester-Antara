@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 ps-3 pb-2 my-3 dashboard rounded-3">
            <div>
                <h1>Hasil Polling {{$datas->first()->polling->id_polling}} -
                    {{$datas->first()->mataKuliah->nama_mataKuliah}}</h1>
            </div>
            <div class="pe-4">
                <a href="{{asset('/dashboard/polling-hasil')}}" class="btn btn-warning gap-2">
                    <i class="bi bi-arrow-left"></i>
                    Back
                </a>
            </div>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

        <div class="card bg-light-subtle shadow border-0 rounded-3 p-4">
            <table class="table table-striped table-sm mt-2">
                <thead>
                <tr>
                    <th scope="col">Waktu polling</th>
                    <th scope="col">User</th>
                    <th scope="col">Kode</th>
                    <th scope="col"> Nama Program Studi</th>
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
                        <td>
                             {{$data->users->programStudi->nama_program_studi ?? '-'}}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
