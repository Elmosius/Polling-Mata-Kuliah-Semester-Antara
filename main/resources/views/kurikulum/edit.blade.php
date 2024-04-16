@extends('dashboard.master')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3 pt-3 ps-3 pb-2 dashboard rounded-1">
            <div>
                <h2>Edit Kurikulum </h2>
            </div>
            <div class="pe-4">
                <a href="{{asset('/dashboard/kurikulum')}}" class="btn btn-warning gap-2">
                    <i class="bi bi-arrow-left"></i>
                    Back
                </a>
            </div>
        </div>

        <div class="card bg-light-subtle shadow border-0 rouded-3">
            <form method="post" action="/dashboard/kurikulum/{{$data->id_kurikulum}}" class="p-4">
                @method('put')
                @csrf
                <div class="mb-3 input-group">
                    <div class="col-4">
                        <label for="Kode Kurikulum" class="form-label">Kode Kurikulum</label>
                        <input type="text" class="form-control @error('id_kurikulum') is-invalid @enderror"
                               id="id_kurikulum"
                               name="id_kurikulum"
                               value="{{old('id_kurikulum',$data->id_kurikulum)}}"
                               disabled>
                        @error('id_kurikulum')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6 ps-3">
                        <label for="Tahun Kurikulum" class="form-label">Tahun</label>
                        <input type="text" class="form-control @error('tahun') is-invalid @enderror"
                               id="tahun"
                               name="tahun"
                               value="{{old('tahun',$data->tahun)}}">
                        @error('tahun')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Edit Kurikulum</button>
            </form>
        </div>
    </main>
@endsection

