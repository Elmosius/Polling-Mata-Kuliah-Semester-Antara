@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3 pt-3 ps-3 pb-2 dashboard rounded-1">
            <div>
                <h1>Create New User</h1>
            </div>
        </div>

        <div class="card bg-light-subtle shadow border-0 rounded-3">
            <form method="post" action="/dashboard/users" class="p-4">
                @csrf
                <div class="mb-3 input-group">
                    <div class="col-4">
                        <label for="id_user" class="form-label fw-semibold">Id User</label>
                        <input type="text" class="form-control @error('id_user') is-invalid @enderror" id="id_user"
                               name="id_user" required autofocus
                               value="{{ old('id_user') }}"
                               placeholder="Not be greater than 5 Character">
                        @error('id_user')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="ps-4 col-8">
                        <label for="nama_user" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama_user') is-invalid @enderror"
                               id="nama_user"
                               name="nama_user"
                               autofocus
                               value="{{ old('nama_user') }}"
                               placeholder="John Doe">
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
                           autofocus
                           value="{{ old('email') }}"
                           placeholder="JohnDoe@gmail.com">
                    @error('email')
                    <div class=" invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 input-group">
                    <div class="col-6 pe-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password"
                               name="password"
                               autofocus
                               value="{{ old('password') }}"
                               placeholder="Must greater than 8 Character">
                        @error('password')
                        <div class=" invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6 ps-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                               id="password_confirmation" name="password_confirmation" autofocus
                               value="{{ old('password') }}"
                               placeholder="Rewrite the password">
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 input-group">
                    <div class="col-6 pe-3">
                        <label for="id_role" class="form-label fw-semibold">Role</label>
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
                    <div class="col-6 ps-3">
                        <label for="id_program_studi" class="form-label fw-semibold">Kode Program Studi</label>
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
                </div>
                <button type="submit" class="btn btn-success">Create User</button>
            </form>
        </div>
    </main>
@endsection

