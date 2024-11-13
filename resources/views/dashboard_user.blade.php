@extends('layout.main')

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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
<<<<<<< HEAD
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Aktivitas Harian</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
=======
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Aktivitas Harian</h3>
  
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
>>>>>>> dashboard_user
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
  
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Hari dan Tanggal</th>
                      <th>Aktivitas Harian</th>
                      <th>Shift</th>
                      <th>Waktu</th>
                      <th>Kategori</th> <!-- Tambahkan kolom Action untuk Edit dan Hapus -->
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Baris kosong sebagai placeholder -->
                    <tr>
                      <td><string>Hari dan Tanggal</string></td>
                      <td><string>Aktivitas Harian</string></td>
                      <td><string>Shift</string></td>
                      <td><string>Waktu</string></td>
                      <td>
                        <!-- Tombol Edit dan Hapus (tidak aktif tanpa data) -->
                        <button class="btn btn-primary" disabled><i class="fas fa-pen"></i> Edit</button>
                        <button class="btn btn-danger" disabled><i class="fas fa-trash-alt"></i> Hapus</button>
                      </td>
                    </tr>
                    <!-- Baris kosong untuk saat data belum ada -->
                    <!-- Jika data sudah ada, ganti bagian ini dengan loop foreach untuk menampilkan data -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
<<<<<<< HEAD
            <!-- /.card-header -->

            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Hari dan Tanggal</th>
                    <th>Aktivitas Harian</th>
                    <th>Shift</th>
                    <th>Action</th> <!-- Tambahkan kolom Action untuk Edit dan Hapus -->
                  </tr>
                </thead>
                <tbody>
                  <!-- Baris kosong sebagai placeholder -->
                  <tr>
                    <td><strong>Hari dan Tanggal</strong></td>
                    <td><strong>Aktivitas Harian</strong></td>
                    <td><strong>Shift</strong></td>
                    <td>
                      <!-- Tombol Edit dan Hapus (tidak aktif tanpa data) -->
                      <button class="btn btn-primary" disabled><i class="fas fa-pen"></i> Edit</button>
                      <button class="btn btn-danger" disabled><i class="fas fa-trash-alt"></i> Hapus</button>
                    </td>
                  </tr>
                  <!-- Baris kosong untuk saat data belum ada -->
                  <!-- Jika data sudah ada, ganti bagian ini dengan loop foreach untuk menampilkan data -->
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
=======
>>>>>>> dashboard_user
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
