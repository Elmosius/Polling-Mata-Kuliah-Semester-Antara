@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">Create New User</h3>
        </div>

        <form method="post" action="/dashboard/users">
            @csrf
            <div class="col-lg-5">
                <div class="mb-3">
                    <label for="id_user" class="form-label">Id User</label>
                    <input type="text" class="form-control @error('id_user') is-invalid @enderror" id="id_user"
                           name="id_user" required autofocus
                           value="{{ old('id_user') }}">
                    @error('id_user')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_user" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama_user') is-invalid @enderror" id="nama_user" name="nama_user"
                           autofocus
                           value="{{ old('nama_user') }}">
                    @error('nama_user')
                    <div class=" invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           name="email"
                           autofocus
                           value="{{ old('email') }}">
                    @error('email')
                    <div class=" invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                           name="password" value="{{ old('password') }}">
                           autofocus
                    @error('password')
                    <div class=" invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                           id="password_confirmation" name="password_confirmation" autofocus
                           value="{{ old('password') }}">
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_role" class="form-label">role</label>
                    <select class="form-select" name="id_role" required>
                        @foreach($roles as $user)
                            @if(old('id_role') == $user->id_role)
                                <option value="{{$user->id_role}}"
                                        selected>{{$user->nama_role}}</option>
                            @else
                                <option value="{{$user->id_role}}">{{$user->nama_role}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_program_studi" class="form-label">Kode Program Studi</label>
                    <select class="form-select" name="id_program_studi" required>
                        @foreach($kode_ps as $user)
                            @if(old('id_program_studi') == $user->id_program_studi)
                                <option value="{{$user->id_program_studi}}"
                                        selected>{{$user->nama_program_studi}}</option>
                            @else
                                <option
                                    value="{{$user->id_program_studi}}">{{$user->nama_program_studi}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </form>
        <canvas class="my-4 w-100" id="myChart" width="900" height="500"></canvas>
    </main>
@endsection

