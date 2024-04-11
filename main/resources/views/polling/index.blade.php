@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h3">Polling Mata Kuliah Semester Antara</h3>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert" id="myAlert">
                {{session('success')}}
            </div>
        @elseif(session()->has('errors'))
            <div class="alert alert-danger d-flex align-items-center" role="alert" id="myAlert">
                <div>
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    {{session('errors')}}
                </div>
            </div>
        @endif
        @can('kaprodi')
            <a href="/dashboard/make-polling" class="text-decoration-none badge bg-success">Lihat Rencana Polling
            </a>
            <a href="/dashboard/polling-hasil" class="text-decoration-none badge bg-success mb-4">Lihat Hasil
                Polling
            </a>
        @endcan
        @if($datas)
            <input type="hidden" name="id_polling" value="{{$datas->id_polling}}">
            <div class="my-2">Periode
                buka: {{ \Carbon\Carbon::parse($datas->start_at)->format('d F Y') }}
                - {{ \Carbon\Carbon::parse($datas->end_at)->format('d F Y') }}
            </div>
            <form method="post" action="/dashboard/polling-detail">
                @csrf
                <div class="col-lg-5">
                    <div class="mb-3">
                        <label for="Kode MataKuliah" class="form-label">Kode - Nama Mata Kuliah</label>
                        @foreach($mks as $mk)
                            <div class="form-check" required>
                                <input type="hidden" name="id_polling" value="{{$datas->id_polling}}">
                                <input class="form-check-input mata-kuliah" type="checkbox"
                                       value="{{$mk->id_mataKuliah}}"
                                       data-sks="{{$mk->sks}}" id="id_mataKuliah" name="id_mataKuliah[]">
                                <label class="form-check-label" for="Kode - Nama Matakuliah">
                                    {{$mk->id_mataKuliah}} - {{$mk->nama_mataKuliah}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <p class="fw-bold" id="total-sks">
                    Total SKS: 0
                </p>
                <p id="error" class="text-danger"></p>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @else
            <div class="alert alert-info" role="alert">
                Tidak ada polling yang dibuka.
            </div>
        @endif
        <canvas class="my-4 w-100" id="myChart" width="900" height="500"></canvas>
    </main>
@endsection

@section('js-tambahan')
    <script>
        $(document).ready(function () {
            $('.mata-kuliah').change(function () {
                var total = 0;
                $('.mata-kuliah:checked').each(function () {
                    total += parseInt($(this).data('sks'));
                });
                $('#total-sks').text('Total SKS: ' + total);

                if (total > 9) {
                    $('#error').text('Total SKS tidak boleh lebih dari 9').show();
                } else {
                    $('#error').hide();
                }
            });
        });
    </script>
@endsection
