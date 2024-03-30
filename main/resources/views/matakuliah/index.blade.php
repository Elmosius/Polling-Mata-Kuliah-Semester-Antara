@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">Mata Kuliah</h3>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

        <div class="table-responsive small col-lg-10">
            <a href="/dashboard/mata-kuliah/create" class="text-decoration-none badge bg-success ms-1">Create Mata Kuliah Baru</a>
            <table class="table table-striped table-sm mt-2">
                <thead>
                <tr>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Nama</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Kode - Nama Program Studi</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($data as $mk)
                    <tr>
                        <td>{{$mk->id_mataKuliah}}</td>
                        <td>{{$mk->nama_mataKuliah}}</td>
                        <td>{{$mk->sks}}</td>
                        <td>{{$mk->semester->semester}}</td>
                        <td>{{$mk->id_program_studi}} - {{$mk->programStudi->nama_program_studi}}</td>
                        <td>{{$mk->kurikulum->tahun}}</td>
                        <td>
                            <a href="/dashboard/mata-kuliah/{{$mk->id_mataKuliah}}/edit" class="badge bg-warning">
                                <span class="bi bi-pencil-square"></span>
                            </a>
                            <form method="post" action="/dashboard/mata-kuliah/{{$mk->id_mataKuliah}}" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                                    <span class="bi bi-x"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <canvas class="my-4 w-100" id="myChart" width="900" height="500"></canvas>
    </main>
@endsection

