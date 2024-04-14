@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3 pt-3 ps-3 pb-2 dashboard rounded-1">
            <div>
                <h2>Create New Mata Kuliah</h2>
            </div>
            <div class="pe-4">
                <a href="{{asset('/dashboard/mata-kuliah')}}" class="btn btn-warning gap-2">
                    <i class="bi bi-arrow-left"></i>
                    Back
                </a>
            </div>

        </div>

        <div class="card bg-light-subtle shadow border-0 rouded-3">
            <form method="post" action="/dashboard/mata-kuliah" class="p-4">
                @csrf
                <div class="mb-3 input-group">
                    <div class="col-4">
                        <label for="Kode MataKuliah" class="form-label fw-semibold">Kode Mata Kuliah</label>
                        <input type="text" class="form-control @error('id_mataKuliah') is-invalid @enderror"
                               id="id_mataKuliah"
                               name="id_mataKuliah" required autofocus
                               value="{{ old('id_mataKuliah') }}"
                               placeholder="Not be greater than 10 Character">
                        @error('id_mataKuliah')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="ps-4 col-3">
                        <label for="sks" class="form-label fw-semibold">SKS</label>
                        <input type="number" class="form-control @error('sks') is-invalid @enderror" id="sks"
                               min="1" max="4"
                               name="sks" required autofocus
                               value="{{ old('sks') }}"
                               style="width: 200px;"
                               placeholder="1-4">
                        @error('sks')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-5">
                        <label for="Semester" class="form-labe fw-semibold">Semester</label>
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
                </div>
                <div class="mb-3">
                    <label for="Nama Mata Kuliah" class="form-label fw-semibold">Nama Mata Kuliah</label>
                    <input type="text" class="form-control @error('nama_mataKuliah') is-invalid @enderror"
                           id="nama_mataKuliah"
                           name="nama_mataKuliah"
                           required autofocus
                           value="{{ old('nama_mataKuliah') }}"
                           placeholder="Pemrograman Web Lanjut">
                    @error('nama_mataKuliah')
                    <div class=" invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 input-group">
                    <div class="col-6 pe-3">
                        <label for="Kode Program Studi" class="form-label fw-semibold">Kode Program Studi</label>
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
                    <div class="col-6 ps-3">
                        <label for="Tahun Kurikulum" class="form-label fw-semibold">Tahun</label>
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
                </div>
                <button type="submit" class="btn btn-success">Create Mata Kuliah</button>
            </form>
        </div>
    </main>
@endsection

