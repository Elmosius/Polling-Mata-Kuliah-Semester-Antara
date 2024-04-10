@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">User</h3>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

        <div class="table-responsive small col-lg-10">
            @can('admin')
                <a href="/dashboard/users/create" class="text-decoration-none badge bg-success ms-1">Create New User</a>
            @endcan
            <table class="table table-striped table-sm mt-2">
                <thead>
                <tr>
                    <th scope="col">Id User</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Program Studi</th>
                    @can('admin')
                        <th scope="col">Action</th>
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
                            <a href="/dashboard/users/{{$user->id_user}}/edit" class="badge bg-warning">
                                <span class="bi bi-pencil-square"></span>
                            </a>
                            <form method="post" action="/dashboard/users/{{$user->id_user}}" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                                    <span class="bi bi-x"></span>
                                </button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <canvas class="my-4 w-100" id="myChart" width="900" height="500"></canvas>
    </main>
@endsection

