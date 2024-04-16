@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 ps-3 pb-2 my-3 dashboard rounded-3">
            <div>
                <h2>Edit Rencana Polling </h2>
            </div>
            <div class="pe-4">
                <a href="{{asset('/dashboard/make-polling')}}" class="btn btn-warning gap-2">
                    <i class="bi bi-arrow-left"></i>
                    Back
                </a>
            </div>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card bg-light-subtle shadow border-0 rounded-3">
            <form method="post" action="/dashboard/polling/{{$datas->id_polling}}" class="p-4">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nama_polling" class="form-label fw-semibold">Nama Polling:</label>
                    <input type="text" class="form-control @error('nama_polling') is-invalid @enderror"
                           id="nama_polling" name="nama_polling"
                           value="{{old('nama_polling', $datas->nama_polling)}}"
                           placeholder="Not be greater than 45 Character">
                    @error('nama_polling')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 input-group">
                    <div class="col-6 pe-4">
                        <label for="start_at" class="form-label fw-semibold">Tanggal Mulai:</label>
                        <input type="date" class="form-control" id="start_at" name="start_at"
                               value="{{old('start_at', \Carbon\Carbon::parse($datas->start_at)->format('Y-m-d'))}}">
                    </div>
                    <div class="col-6">
                        <label for="end_at" class="form-label fw-semibold">Tanggal Selesai:</label>
                        <input type="date" class="form-control" id="end_at" name="end_at"
                               value="{{old('end_at', \Carbon\Carbon::parse($datas->end_at)->format('Y-m-d'))}}">
                    </div>
                </div>
                <div class="mb-3 col-2">
                    <label for="is_active" class="form-label fw-semibold">Status Aktif:</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="1" {{ old('is_active', $datas->is_active) == 1 ? 'selected' : '' }}>Aktif
                        </option>
                        <option value="0" {{ old('is_active', $datas->is_active) == 0 ? 'selected' : '' }}>Tidak
                            Aktif
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Edit</button>
            </form>
        </div>
    </main>
@endsection
