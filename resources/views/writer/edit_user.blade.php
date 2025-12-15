@extends('layout.main_user')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data Aktivitas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Aktivitas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <a href="{{ route('writer.tambah-aktivitas') }}" class="btn btn-secondary mb-3">Kembali</a>

                    <!-- Form Edit Aktivitas -->
                    <form action="{{ route('writer.store-edit-user', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #b11313;">
                                <h3 class="card-title">Form Edit Data Aktivitas</h3>
                            </div>

                            <!-- form start -->
                            <div class="card-body">
                                <div class="row">
                                    <!-- Tanggal -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal</label>
                                            <input type="date" class="form-control" id="exampleInputEmail1" name="tanggal" value="{{ old('tanggal', $data->tanggal) }}">
                                            @error('tanggal')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Shift -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Shift</label>
                                            <select class="form-control" name="shift">
                                                <option value="Pagi" {{ $data->shift == 'Pagi' ? 'selected' : '' }}>Pagi</option>
                                                <option value="Sore" {{ $data->shift == 'Sore' ? 'selected' : '' }}>Sore</option>
                                            </select>
                                            @error('shift')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Mulai Kerja -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mulai Kerja</label>
                                            <input type="time" name="mulai_kerja" class="form-control" id="exampleInputPassword1" value="{{ old('mulai_kerja', $data->mulai_kerja) }}">
                                            @error('mulai_kerja')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Selesai Kerja -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Selesai Kerja</label>
                                            <input type="time" name="selesai_kerja" class="form-control" id="exampleInputPassword1" value="{{ old('selesai_kerja', $data->selesai_kerja) }}">
                                            @error('selesai_kerja')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Aktivitas Harian -->
                                <div class="form-group">
                                    <label for="aktivitas">Aktivitas Harian :</label>
                                    <textarea class="form-control" id="aktivitas" name="aktivitas" rows="4" placeholder="Isi aktivitas harian Anda...">{{ old('aktivitas', $data->aktivitas) }}</textarea>
                                    @error('aktivitas')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Bukti Foto -->
                                <div class="form-group">
                                    <label for="photo">Bukti Foto</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                    @error('photo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
