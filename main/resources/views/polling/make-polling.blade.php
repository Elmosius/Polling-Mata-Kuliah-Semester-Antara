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
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
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
                        </td>
                        <td>
                            <button class="badge bg-danger border-0"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-id="{{$pol->id_polling}}">
                                <span class="bi bi-x"></span>
                            </button>
                        </td>
                    </tr>
                </thead>
                <tbody>
                @endforeach

            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Polling</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="p-0 pb-1 m-0"> Apakah anda akan menghapus polling ini?</p>
                        <p class="fst-italic modal-keterangan">Data yang dihapus tidak bisa dikembalikan </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form method="post" action="" class="d-inline" id="deleteForm">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        <canvas class="my-4 w-100" id="myChart" width="900" height="500"></canvas>
    </main>
@endsection

@section('js-tambahan')
    <script>
        $(document).ready(function(){
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var formAction = "/dashboard/polling/" + id;
                $('#deleteForm').attr('action', formAction);
            });
        });
    </script>
@endsection

