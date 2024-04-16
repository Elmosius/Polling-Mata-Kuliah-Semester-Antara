@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 ps-3 pb-2 my-3 dashboard rounded-3">
            <div>
                <h2>Edit Polling </h2>
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
            <form method="post" action="/dashboard/polling-detail/{{$hasil->id_polling}}" class="p-4">
                @method('put')
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
                <button type="submit" class="btn btn-success">Edit</button>
            </form>
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
