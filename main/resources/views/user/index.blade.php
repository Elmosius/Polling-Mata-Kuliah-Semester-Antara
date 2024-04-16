@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3 pt-3 ps-3 pb-2 dashboard rounded">
            <div>
                <h1>User</h1>
            </div>
            <div class="pe-3">
                @can('admin')
                    <a href="/dashboard/users/create" class="btn btn-success d-flex">
                        <i class="bi bi-person-plus-fill"></i>
                        <span class="ps-2">Add New User</span>
                    </a>
                @endcan
            </div>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert" id="myAlert">
                {{session('success')}}
            </div>
        @endif

        <div class="card bg-light-subtle shadow border-0 rounded-3">
            <div class="border-bottom ps-3 pt-3">
                <p class="fw-semibold">Semua User</p>
            </div>
            <div class="table-responsive small px-3">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Id User</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Program Studi</th>
                        @can('admin')
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $user)
                        <tr>
                            <td>{{$user->id_user}}</td>
                            <td>{{$user->nama_user}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->nama_role}}</td>
                            <td>{{($user->programStudi->nama_program_studi) ?? '-'}}</td>
                            @can('admin')
                                <td>
                                    <a href="/dashboard/users/{{$user->id_user}}/edit"
                                       class="btn btn-warning pt-0 pb-1 px-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-danger pt-0 pb-1 px-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            data-id="{{$user->id_user}}">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
            </div>
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="p-0 pb-1 m-0"> Apakah anda akan menghapus user ini?</p>
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
        </div>
    </main>
@endsection

@section('js-tambahan')
    <script>
        $(document).ready(function(){
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var formAction = "/dashboard/users/" + id;
                $('#deleteForm').attr('action', formAction);
            });
        });
    </script>
@endsection
