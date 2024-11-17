@extends('layout.main_admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jumlah Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Jumlah Admin</li>
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
            <a href="{{ route('admin.create-admin') }}" class="btn btn-primary mb-3">Tambah Data</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Jumlah Admin</h3>

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
                      <th>Nama Admin</th>
                      <th>Email</th>
                      <th>Divisi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Baris kosong untuk tampilan awal tanpa data -->
                    @foreach ($data as $data)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->divisi}}</td>
                      <td>
                        <button type="button" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</button>
                        <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                      </td>
                      <div class="modal fade" id="modal-hapus{{ $data->id }}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Apakah kamu yakin ingin menghapus data user <b>{{ $data->name }}</b></p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <form action="{{ route('admin.delete-admin',['id' => $data->id]) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak!</button>
                                <button type="submit" class="btn btn-primary">Ya, Hapus Data</button>
                                </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                    </tr>
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
