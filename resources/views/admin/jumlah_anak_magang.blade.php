@extends('layout.main_admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jumlah Anak Magang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard_admin') }}">Beranda</a></li>
              <li class="breadcrumb-item active">Jumlah Anak Magang</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a href="{{ route('admin.create_anak_magang') }}" class="btn btn-primary mb-3">Tambah Data</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Jumlah Anak Magang</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Anak Magang</th>
                      <th>Nama Sekolah</th>
                      <th>Divisi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Baris kosong untuk tampilan awal tanpa data -->
                    <tbody>
                        @foreach ($data as $anak_magang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $anak_magang->name }}</td>
                            <td>{{ $anak_magang->sekolah }}</td>
                            <td>{{ $anak_magang->divisi }}</td>
                            <td>
                                <button type="button" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</button>
                                <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>
@endsection
