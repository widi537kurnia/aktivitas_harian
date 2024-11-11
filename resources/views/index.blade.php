@extends('layout.main')
@section('content')
 tambah_data_aktivitas
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data Aktivitas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data User</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-12 col-md-80">
                            <!-- general form elements -->
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Data Aktivitas</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- date input -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Tanggal :</label>
                                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                      <input type="date" class="form-control date-input" data-target="#reservationdate" name="tanggal" placeholder="Tanggal...">
                                                      <div class="input-group-append" data-target="#reservationdate" data-toggle="date">
                                                          <div class="input-group-text">
                                                            <i class="fa fa-calendar"></i>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  @error('tanggal')
                                                    <small>{{ $message }}</small>
                                                  @enderror
                                                </div>
                                            </div>

                                             <!-- /.card-header -->

                                            <!-- sift input-->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Shift :</label>
                                                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="shift" placeholder="Sift Kerja...">
                                                            <option selected ="selected"></option>
                                                            <option data-select2-id="1">Pagi</option>
                                                            <option data-select2-id="2">Sore</option>
                                                        </select>
                                                    </div>
                                                    @error('shift')
                                                    <small>{{ $message }}</small>
                                                  @enderror
                                                </div>

                                            <!-- Jam Mulai dan Jam Pulang -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Mulai Kerja :</label>
                                                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                        <input type="time" class="form-control datetimepicker-input" data-target="#timepicker" placeholder="Jam Mulai Kerja...">
                                                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                            <div class="input-group-text">
                                                                <i class="far fa-clock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Selesai Kerja :</label>
                                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                            <input type="time" class="form-control datetimepicker-input" data-target="#timepicker" placeholder="Jam Selesai Kerja...">
                                                            <div class="input-group-append" data-target="#timepicker"data-toggle="datetimepicker">
                                                                <div class="input-group-text">
                                                                    <i class="far fa-clock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!-- /.input group -->
                                                </div>
                                              <!-- /.form group -->
                                            </div>

                                            <!--/Isi aktivitas-->
                                            <div class="form-group">
                                              <div class="col-sm-12">
                                                <label for="exampleInputEmail1">Aktivitas Harian :</label>
                                                <textarea type="text" name="aktivitas_harian" class="form-control" id="exampleInputEmail1" rows="4" cols="500" placeholder="Isi aktifitas harian Anda..."></textarea>
                                                @error('aktivitas_harian')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                              </div>
                                          </div>

                                        <!--button-->
                                        <div class="d-flex justify-content-end">
                                            <div class="input-group input-group-sm" style="width: 100px;">
                                            <button type="submit" class="btn btn-danger">Kirim</button>
                                          </div>
                                        </div>
                                      <!-- /.card-body -->
                                    </div>
                                  <!-- /.input group -->
                            </div>

                                        <!--nanti ini akan di hapus
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Photo Profile</label>
                                            <input type="file" class="form-control" id="exampleInputEmail1"
                                                name="photo">
                                            @error('photo')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                name="email" placeholder="Enter email">
                                            @error('email')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input type="text" name="nama" class="form-control"
                                                id="exampleInputEmail1" placeholder="Enter name">
                                            @error('nama')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword1" placeholder="Password">
                                            @error('password')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <!- /.card-body ->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                  hapus akhir-->
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


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
 master
    </div>



    <!--KODE DI BAWAH TIDAK DI GUNAKAN-->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Tabel User</h3>

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
                                        <th>Photo</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('storage/photo-user/' . $d->image) }}" alt=""
                                                width="100"></td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', ['id' => $d->id]) }}"
                                                class="btn btn-primary"><i class="fas fa-pen">Edit</i></a>
                                            <a data-toggle="modal" data-target="#modal-hapus{{ $d->id }}"
                                                class="btn btn-danger"><i class="fas fa-trash-alt">Hapus</i></a>
                                        </td>
                                        </tr>
                                        <div class="modal fade" id="modal-hapus{{ $d->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah kamu yakin ingin menghapus data user
                                                            <b>{{ $d->name }}</b></p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <form action="{{ route('admin.user.delete', ['id' => $d->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Tidak!</button>
                                                            <button type="submit" class="btn btn-primary">Ya, Hapus
                                                                Data</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 tambah_data_aktivitas
    </div>

</div>

 master
@endsection
