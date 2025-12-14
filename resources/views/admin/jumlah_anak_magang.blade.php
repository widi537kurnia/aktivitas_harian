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
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Tabel Anak Magang</h3>
                    <form action="{{ route('admin.cari-anak') }}" method="GET" class="ml-auto">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
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
                    <!-- Baris kosong untuk tampilan awal tanpa data -->
                    <tbody>
                        @foreach ($data as $anak_magang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $anak_magang->name }}</td>
                            <td>{{ $anak_magang->sekolah }}</td>
                            <td>{{ $anak_magang->divisi }}</td>
                            <td>
                                <a href="{{ route('admin.edit-anak',['id' => $anak_magang->id]) }}" class="btn btn-warning"><i class="fas fa-pen"></i>
                                    Edit
                                </a>
                                <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-hapus{{$anak_magang->id}}"><i class="fas fa-trash"></i>
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-hapus{{$anak_magang->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                Apakah anda yakin ingin menghapus data {{$anak_magang->name}} ?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.delete-anak',['id' => $anak_magang->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-danger">Ya, hapus</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        @endforeach
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
