@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h3">Polling Mata Kuliah Semester Antara</h3>
        </div>
        <a href="/dashboard/polling-matakuliah/create" class="text-decoration-none badge bg-success ms-1">Create Polling Baru</a>
        <form method="post" action="/dashboard/polling-matakuliah">
            @csrf
            <div class="col-lg-5">
                <div class="mb-3">
                    @foreach($data as $dt)
                        <p for="Periode" class="form-label">Periode xx - xx </p>
                        <label for="Kode MataKuliah" class="form-label">Kode - Nama Mata Kuliah</label>
                        <a href="/dashboard/polling-matakuliah/{{$data->id_polling}}/edit"
                           class="text-decoration-none badge bg-success mb-3">Edit Polling</a>
{{--                        @if(old('id_mataKuliah') == $mk->id_mataKuliah)--}}
{{--                            <div class="form-check" name="id_mataKuliah" required>--}}
{{--                                <input class="form-check-input" type="checkbox" value="{{$mk->id_mataKuliah}}"--}}
{{--                                       id="id_mataKuliah">--}}
{{--                                <label class="form-check-label" for="Kode - Nama Matakuliah">--}}
{{--                                    {{$mk->id_mataKuliah}} - {{$mk->nama_mataKuliah}}--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <div class="form-check" name="id_mataKuliah" required>--}}
{{--                                <input class="form-check-input" type="checkbox" value="{{$mk->id_mataKuliah}}"--}}
{{--                                       id="flexCheckDefault">--}}
{{--                                <label class="form-check-label" for="Kode - Nama Matakuliah">--}}
{{--                                    {{$mk->id_mataKuliah}} - {{$mk->nama_mataKuliah}}--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                    @endforeach

                </div>
            </div>
            <p class="fw-bold">
                Total SKS yang dipilih:
            </p>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <canvas class="my-4 w-100" id="myChart" width="900" height="500"></canvas>
    </main>
@endsection

