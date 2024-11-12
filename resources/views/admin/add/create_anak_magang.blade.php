@extends('layout.main_admin')
@section('content')

    <!-- Content Header (Page Header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Anak Magang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard_admin') }}">Beranda</a></li>
              <li class="breadcrumb-item active">Tambah Anak Magang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <form action="{{ route('admin.add.create_anak_magang') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <a href="{{ route('admin.jumlah_anak_magang') }}" class="btn btn-secondary mb-3">Kembali</a>
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Anak Magang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Nama Anak Magang</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="anak_magang" placeholder="Masukkan Nama Anak Magang">
                    @error('nama')
                        <small>{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Nama Sekolah</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="sekolah" placeholder="Masukkan Nama Sekolah">
                    @error('nama')
                        <small>{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Divisi</label>
                    <input type="text" name="divisi" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Divisi">
                    @error('nama')
                        <small>{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

  </div>

@endsection
