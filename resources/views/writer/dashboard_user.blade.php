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
    <section class="content">
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
                    @foreach ($data as $item)
                    <tr>
                      <td><strong>{{$loop->iteration}}</strong></td>
                      <td><img src="{{ asset('storage/photo-user/' . $item->photo) }}" alt="foto" width="100"></td>
                      <td><strong>{{$item->mulai_kerja}}</strong></td>
                      <td><strong>{{$item->selesai_kerja}}</strong></td>
                      <td><strong>{{$item->aktivitas}}</strong></td>
                      <td><strong>{{$item->shift}}</strong></td>
                      <td><strong>{{$item->created_at->format('d-m-Y H:i:s') }}</strong></td>
                      <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('aktivitas.edit', $item->id) }}" class="btn btn-primary">
                          <i class="fas fa-pen"></i> Edit
                        </a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('aktivitas.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Hapus
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
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
