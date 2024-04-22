@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3 pt-3 pb-2 dashboard rounded-1">
            <div class="container d-flex justify-content-between align-items-center">
                <div>
                    <h1>Dashboard</h1>
                    <h5 class="ps-1">Hi! {{auth()->user()->nama_user}}, nice to see you again</h5>
                </div>
                <img class="dashboard-img p-3" src="{{asset('/img/awan.png')}}" alt="cloud">
            </div>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

        @if( auth()->user()->id_role != 3 )

            @if($jumlah != 0)
                <div class="card bg-light-subtle shadow border-0 rounded-3 mb-4">
                    <div class="border-bottom ps-3 pt-3">
                        <p class="fw-semibold">Ongoing Polling</p>
                    </div>
                    <div class="table-responsive small px-3">
                        <table class="table table-striped table-sm mt-1">
                            <thead>
                            <tr>
                                <th scope="col">Polling number</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End date</th>
                                <th scope="col">Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $pol)
                                <tr>
                                    <td>
                                        {{{$pol->id_polling}}}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($pol->start_at)->format('d F Y') }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($pol->end_at)->format('d F Y') }}
                                    </td>
                                    <td>
                                        <a href="/dashboard/polling-hasil"
                                           class="text-decoration-none badge bg-dark ms-1">
                                            <i class="bi bi-box-arrow-up-right"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="alert alert-info mb-4" role="alert">
                    Tidak ada polling yang dibuka.
                </div>
            @endif
            <div class="container text-center px-0 mb-4">
                <div class="row">
                    <div class="col">
                        <div class="info-box mb-3">
                            <span class="info-box-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-ui-checks"
                                                             viewBox="0 0 16 16">
                            <path
                                d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zM2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2zm.854-3.646a.5.5 0 0 1-.708 0l-1-1a.5.5 0 1 1 .708-.708l.646.647 1.646-1.647a.5.5 0 1 1 .708.708zm0 8a.5.5 0 0 1-.708 0l-1-1a.5.5 0 0 1 .708-.708l.646.647 1.646-1.647a.5.5 0 0 1 .708.708zM7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                            </svg></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Mahasiswa yang telah voting</span>
                                <span class="info-box-number">{!! count($hasilVoted) !!}
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="col">
                        <div class="info-box mb-3">
                            <span class="info-box-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-card-checklist"
                                                             viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                            <path
                                d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
                            </svg></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Polling yang telah dibuat</span>
                                <span class="info-box-number">{!! count($hasilPolling) !!}</span>
                            </div>

                        </div>
                    </div>
                    <div class="col">
                        <div class="info-box mb-3">
                            <span class="info-box-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-calendar2-check-fill"
                                                             viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5m9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5m-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                            </svg></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Periode polling telah selesai</span>
                                <span class="info-box-number">{!! count($periodEnd) !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="" id="chartPembungkus" style="padding: 70px; padding-top: 0px">
                <canvas id="myChart"></canvas>
            </div>

            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).ready(function () {
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('/get-chart') }}",
                        dataType: 'json',
                        data: {},
                        success: function (response) {
                            const ctx = document.getElementById('myChart');
                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: response.nama,
                                    datasets: [{
                                        label: '# of Votes',
                                        data: response.jumlah,
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        }
                    });
                });
            </script>

        @else
            <div class="card bg-light-subtle shadow border-0 rounded-3 mb-4 mt-3">
                <div class="border-bottom ps-3 pt-3">
                    <p class="fw-semibold">History Polling</p>
                </div>
                <div class="table-responsive small px-3">
                    <table class="table table-striped table-sm mt-1">
                        <thead>
                        <tr>
                            <th scope="col">Polling name</th>
                            <th scope="col">Start date</th>
                            <th scope="col">End date</th>
                            <th scope="col">View Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($histories as $history)
                            <tr>
                                <td>
                                    {{ $history->nama_polling }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($history->start_at)->format('d F Y') }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($history->end_at)->format('d F Y') }}
                                </td>
                                <td>
                                    <a class="text-decoration-none badge bg-dark ms-1 btn_detail"
                                       data-bs-toggle="modal"
                                       data-bs-target="#detail"
                                       data-id_polling={{ $history->id_polling }} >
                                        <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">History Mata Kuliah</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped table-sm mt-1">
                                <thead>
                                <tr>
                                    <th scope="col">Kode - Nama Matakuliah</th>
                                    <th scope="col">SKS</th>
                                    <th scope="col">Program Studi</th>
                                </tr>
                                </thead>
                                <tbody id="history-details">

                                </tbody>
                            </table>
                            <p>Total SKS: <span id="total-sks"></span></p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).on("click", ".btn_detail", function () {
                    let id_polling = $(this).data('id_polling');
                    console.log(id_polling);
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('/get-history') }}/" + id_polling,
                        dataType: 'json',
                        success: function (response) {
                            $("#history-details").empty();

                            $.each(response, function (index, detail) {
                                $("#history-details").append(`
                    <tr>
                        <td>${detail.mata_kuliah.id_mataKuliah} - ${detail.mata_kuliah.nama_mataKuliah}</td>
                        <td>${detail.mata_kuliah.sks}</td>
                        <td>${detail.mata_kuliah.id_program_studi}</td>
                    </tr>
                `);
                            });
                            totalSks = response.reduce((acc, curr) => acc + parseInt(curr.mata_kuliah.sks), 0);
                            $("#total-sks").text(totalSks);
                        }
                    });
                });
            </script>

            <div class="container" id="history-div">

            </div>
        @endif

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </main>
@endsection
