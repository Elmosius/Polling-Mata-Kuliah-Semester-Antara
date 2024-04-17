@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="my-3 pt-3 ps-3 pb-2 dashboard rounded-1">
            <div>
                <h1>Polling Mata Kuliah Semester Antara</h1>
            </div>
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

        @if(!$hasVoted && $datas)
            <div class="card bg-light-subtle shadow border-0 rounded-3 mt-2">
                <input type="hidden" name="id_polling" value="{{$datas->id_polling}}">
                <div class="my-2 border-bottom ps-3 py-2">
                    <h6 class="fw-semibold">
                        Periode buka: {{ \Carbon\Carbon::parse($datas->start_at)->format('d F Y') }}
                        - {{ \Carbon\Carbon::parse($datas->end_at)->format('d F Y') }}
                    </h6>
                </div>
                <form method="post" action="/dashboard/polling-detail" class="py-2 px-4">
                    @csrf
                    <div class=" card col-lg-6">
                        <table class="table table-striped table-sm mb-3">
                            <thead>
                            <tr>
                                <th></th>
                                <th scope="col">Kode</th>
                                <th scope="col">Mata Kuliah</th>
                                <th scope="col">SKS</th>
                                <th scope="col">Tahun</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mks as $mk)
                                <tr>
                                    <td>
                                        <input type="hidden" name="id_polling" value="{{$datas->id_polling}}">
                                        <input class="form-check-input mata-kuliah" type="checkbox"
                                               value="{{$mk->id_mataKuliah}}"
                                               data-sks="{{$mk->sks}}" id="id_mataKuliah" name="id_mataKuliah[]">
                                    </td>
                                    <td>{{$mk->id_mataKuliah}}</td>
                                    <td>{{$mk->nama_mataKuliah}}</td>
                                    <td>{{$mk->sks}}</td>
                                    <td>{{$mk->kurikulum->tahun}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        <p class="fw-bold ps-4" id="total-sks">
                            Total SKS: 0
                        </p>
                    </div>
                    <p id="error" class="text-danger" style="display: none"></p>
                    <button type="submit" class=" my-3 btn btn-success">Submit Polling</button>
                </form>
                @elseif($hasVoted)
                    @if($now->greaterThan($datas->start_at) && $now->lessThan($datas->end_at))
                        <h6 class="fw-semibold">
                            Periode buka: {{ \Carbon\Carbon::parse($datas->start_at)->format('d F Y') }}
                            - {{ \Carbon\Carbon::parse($datas->end_at)->format('d F Y') }}
                        </h6>
                        <a class="btn btn-primary"
                           href="/dashboard/polling-detail/{{$datas->id_polling}}/edit">Edit Polling</a>
                    @endif
                @else
                    <div class="alert alert-info" role="alert">
                        Tidak ada polling yang dibuka.
                    </div>
                @endif
            </div>
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
