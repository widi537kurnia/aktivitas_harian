@extends('layout.main_admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard_admin') }}">Beranda</a></li>
              <li class="breadcrumb-item active">Tambah Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <a href="{{ route('admin.jumlah_admin') }}" class="btn btn-secondary mb-3">Kembali</a>
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.input-admin') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Nama Admin</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Masukkan Nama Admin">
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Masukkan Email">
                        @error('email')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Masukkan Password">
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Masukkan Email">
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="divisi">Divisi</label>
                        <select class="form-control" id="divisi" name="divisi">
                            <option value="web">Web</option>
                            <option value="desain">Desain</option>
                            <option value="video">Video</option>
                        </select>
                        @error('divisi')
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
