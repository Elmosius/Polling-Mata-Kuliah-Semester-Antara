@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">Create Mata Kuliah Baru </h3>
        </div>

        <form method="post" action="/dashboard/mata-kuliah">
            @csrf
            <div class="col-lg-5">
                <div class="mb-3">
                    <label for="Kode MataKuliah" class="form-label">Kode Mata Kuliah</label>
                    <input type="text" class="form-control @error('id_mataKuliah') is-invalid @enderror"
                           id="id_mataKuliah"
                           name="id_mataKuliah" required autofocus
                           value="{{ old('id_mataKuliah') }}">
                    @error('id_mataKuliah')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="Nama Mata Kuliah" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama_mataKuliah') is-invalid @enderror"
                           id="nama_mataKuliah"
                           name="nama_mataKuliah"
                           required autofocus
                           value="{{ old('nama_mataKuliah') }}">
                    @error('nama_mataKuliah')
                    <div class=" invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="sks" class="form-label">SKS</label>
                    <input type="number" class="form-control @error('sks') is-invalid @enderror" id="sks"
                           min="1" max="4"
                           name="sks" required autofocus
                           value="{{ old('sks') }}" style="width: 200px;">
                    @error('sks')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Semester" class="form-label">Semester</label>
                    <select class="form-select" name="id_semester" required>
                        @foreach($semester as $mk)
                            @if(old('id_semester') == $mk->id_semester)
                                <option value="{{$mk->id_semester}}"
                                        selected>{{$mk->semester}}</option>
                            @else
                                <option value="{{$mk->id_semester}}">{{$mk->semester}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Kode Program Studi" class="form-label">Kode Program Studi</label>
                    <select class="form-select" name="id_program_studi" required>
                        @foreach($ps as $mk)
                            @if(old('id_program_studi') == $mk->id_program_studi)
                                <option value="{{$mk->id_program_studi}}"
                                        selected>{{$mk->nama_program_studi}}</option>
                            @else
                                <option
                                    value="{{$mk->id_program_studi}}">{{$mk->nama_program_studi}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Tahun Kurikulum" class="form-label">Tahun</label>
                    <select class="form-select" name="id_kurikulum" required>
                        @foreach($kurikulum as $mk)
                            @if(old('id_kurikulum') == $mk->id_kurikulum)
                                <option value="{{$mk->id_kurikulum}}"
                                        selected>{{$mk->tahun}}</option>
                            @else
                                <option value="{{$mk->id_kurikulum}}">{{$mk->tahun}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create Mata Kuliah</button>
            </div>
        </form>
        <canvas class="my-4 w-100" id="myChart" width="900" height="500"></canvas>
    </main>
@endsection

