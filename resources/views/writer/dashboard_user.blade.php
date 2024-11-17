@extends('layout.main_user')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Riwayat Aktivitas Harian</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" enctype="multipart/form-data">
      <div class="container-fluid">
        <div class="row">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Aktivitas Harian</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Cari">
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
                    <th>Bukti</th>
                    <th>Mulai Kerja</th>
                    <th>Selesai Kerja</th>
                    <th>Aktivitas Harian</th>
                    <th>Shift</th>
                    <th>Hari dan Jam</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data )
                    <tr>
                      <td><strong>{{$loop->iteration}}</strong></td>
                      <td><img src="{{ asset('storage/photo-user/' . $data->photo) }}" alt="foto" width="100"></td>
                      <td><strong>{{$data->mulai_kerja}}</strong></td>
                      <td><strong>{{$data->selesai_kerja}}</strong></td>
                      <td><strong>{{$data->aktivitas}}</strong></td>
                      <td><strong>{{$data->shift}}</strong></td>
                      <td><strong>{{$data->created_at->format('d-m-Y H:i:s') }}</strong></td>
                      <td>
                        <!-- Tombol Edit dan Hapus (tidak aktif tanpa data) -->
                        <button class="btn btn-primary"><i class="fas fa-pen"></i> Edit</button>
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                      </td>
                    </tr>
                    @endforeach
                  <!-- Baris kosong untuk saat data belum ada -->
                  <!-- Jika data sudah ada, ganti bagian ini dengan loop foreach untuk menampilkan data -->
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
