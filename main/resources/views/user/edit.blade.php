@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 ps-3 pb-2 my-3 dashboard rounded-1">
            <div>
                <h2>Edit User</h2>
            </div>
            <div class="pe-4">
                <a href="{{asset('/dashboard/users')}}" class="btn btn-warning gap-2">
                    <i class="bi bi-arrow-left"></i>
                    Back
                </a>
            </div>
        </div>

        <div class="card bg-light-subtle shadow border-0 rounded-3">
            <form method="post" action="/dashboard/users/{{$datas->id_user}}" class="p-4">
                @method('put')
                @csrf
                <div class="mb-3 input-group">
                    <div class="col-4">
                        <label for="id_user" class="form-label">Id User</label>
                        <input type="text" class="form-control @error('id_user') is-invalid @enderror" id="id_user"
                               name="id_user" required
                               value="{{ old('id_user', $datas->id_user) }}" readonly>
                        @error('id_user')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-8 ps-4">
                        <label for="nama_user" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama_user') is-invalid @enderror" id="nama_user"
                               name="nama_user"
                               autofocus
                               value="{{ old('nama_user', $datas->nama_user) }}">
                        @error('nama_user')
                        <div class=" invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           name="email"
                           value="{{ old('email', $datas->email) }}" readonly>
                    @error('email')
                    <div class=" invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 input-group">
                    <div class="col-6 pe-4">
                        <label for="id_role" class="form-label">role</label>
                        <select class="form-select" name="id_role" required>
                            @foreach($roles as $user)
                                @if(old('id_role', $datas->id_role) == $user->id_role)
                                    <option value="{{$user->id_role}}"
                                            selected>{{$user->nama_role}}</option>
                                @else
                                    <option value="{{$user->id_role}}">{{$user->nama_role}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="id_program_studi" class="form-label">Kode Program Studi</label>
                        <select class="form-select" name="id_program_studi" required>
                            @foreach($kode_ps as $user)
                                @if(old('id_program_studi', $datas->id_program_studi) == $user->id_program_studi)
                                    <option value="{{$user->id_program_studi}}"
                                            selected>{{$user->nama_program_studi}}</option>
                                @else
                                    <option
                                        value="{{$user->id_program_studi}}">{{$user->nama_program_studi}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 input-group">
                    <div class="col-6 pe-4">
                        <label for="password" class="form-label">Old Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password"
                               name="password" autofocus>
                        @error('password')
                        <div class=" invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                               id="new_password" name="new_password" autofocus>
                        @error('new_password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                           id="new_password_confirmation" name="new_password_confirmation" autofocus>
                    @error('new_password_confirmation')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Edit User</button>

            </form>
        </div>
    </main>
@endsection

