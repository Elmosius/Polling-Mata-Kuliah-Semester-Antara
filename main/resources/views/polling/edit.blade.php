@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">Edit Polling </h3>
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

        <form method="post" action="/dashboard/polling/{{$datas->id_polling}}">
            @method('put')
            @csrf
            <div class="col-lg-5">
                <div class="mb-3">
                    <label for="id_polling" class="form-label">ID Polling:</label>
                    <input type="text" class="form-control @error('id_polling') is-invalid @enderror"
                           id="id_polling" name="id_polling" value="{{old('id_polling', $datas->id_polling)}}"
                           readonly>
                    @error('id_polling')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="start_at" class="form-label">Tanggal Mulai:</label>
                    <input type="date" class="form-control" id="start_at" name="start_at"
                           value="{{old('start_at', \Carbon\Carbon::parse($datas->start_at)->format('Y-m-d'))}}">
                </div>
                <div class=" mb-3">
                    <label for="end_at" class="form-label">Tanggal Selesai:</label>
                    <input type="date" class="form-control" id="end_at" name="end_at"
                           value="{{old('end_at', \Carbon\Carbon::parse($datas->end_at)->format('Y-m-d'))}}">
                </div>
                <div class="mb-3">
                    <label for="is_active" class="form-label">Status Aktif:</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="1" {{ old('is_active', $datas->is_active) == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('is_active', $datas->is_active) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
        <canvas class="my-4 w-100" id="myChart" width="900" height="500"></canvas>
    </main>
@endsection
