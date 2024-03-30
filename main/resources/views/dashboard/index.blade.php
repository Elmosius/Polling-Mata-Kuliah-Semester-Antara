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

        <div class="table-responsive small col-lg-6
        ">
            <table class="table table-striped table-sm mt-2">
                <thead>
                <tr>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah polling</th>
                </tr>
                </thead>
                <tbody>
{{--                @foreach($posts as $post)--}}
{{--                    <tr>--}}
{{--                        <td>{{$loop->iteration }}</td>--}}
{{--                        <td>{{$post->title}}</td>--}}
{{--                        <td>{{$post->category->name}}</td>--}}
{{--                        <td>--}}
{{--                            <a href="/dashboard/posts/{{$post->id}}" class="badge bg-success">--}}
{{--                                <span class="bi bi-eye"></span>--}}
{{--                            </a>--}}
{{--                            <a href="/dashboard/posts/{{$post->id}}/edit" class="badge bg-warning">--}}
{{--                                <span class="bi bi-pencil-square"></span>--}}
{{--                            </a>--}}
{{--                            <form method="post" action="/dashboard/posts/{{$post->id}}" class="d-inline">--}}
{{--                                @method('delete')--}}
{{--                                @csrf--}}
{{--                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">--}}
{{--                                    <span class="bi bi-x"></span>--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
                </tbody>
            </table>
        </div>
        <canvas class="my-4 w-100" id="myChart" width="900" height="500"></canvas>
    </main>
@endsection

