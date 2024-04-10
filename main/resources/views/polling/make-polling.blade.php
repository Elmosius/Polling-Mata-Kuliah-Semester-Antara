@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">Buat Polling</h3>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert" id="myAlert">
                {{session('success')}}
            </div>
        @elseif(session()->has('errors'))
            <div class="alert alert-danger d-flex align-items-center" role="alert" id="myAlert">
                <div>
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    {{session('errors')}}
                </div>
            </div>
        @endif

        <a href="/dashboard/polling/create" class="text-decoration-none badge bg-success">Create Polling
            Baru
        </a>

        <div class="table-responsive small col-lg-10">
            <table class="table table-striped table-sm ">
                <thead>
                <tr>
                    <th scope="col">Nomor Polling</th>
                    <th scope="col">Periode</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                @foreach($datas as $pol)
                    <tr>
                        <td>{{$pol->id_polling}}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($pol->start_at)->format('Y-m-d') }}
                            - {{ \Carbon\Carbon::parse($pol->end_at)->format('Y-m-d') }}
                        </td>
                        <td>{{ $pol->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td>
                            <a href="/dashboard/polling/{{$pol->id_polling}}/edit" class="badge bg-warning">
                                <span class="bi bi-pencil-square"></span>
                            </a>
                            <form method="post" action="/dashboard/polling/{{$pol->id_polling}}" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                                    <span class="bi bi-x"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                </thead>
                <tbody>
                @endforeach

            </table>
        </div>
        <canvas class="my-4 w-100" id="myChart" width="900" height="500"></canvas>
    </main>
@endsection
