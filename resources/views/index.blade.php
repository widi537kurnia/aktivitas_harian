@extends('layout.main')
@section('content')
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
                                                    <div class="input-group" id="reservationdate" data-target-input="nearest">
                                                      <input type="date" class="form-control date-input" data-target="#reservationdate" name="tanggal" placeholder="Tanggal...">
                                                      <div class="input-group-append" data-target="#reservationdate" data-toggle="date"></div>
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

                                            <!-- jam mulai dan jam pulang -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Mulai Kerja :</label>
                                                    <div class="input-group" id="timepicker" data-target-input="nearest">
                                                        <input type="time" class="form-control datetimepicker-input" data-target="#timepicker" name="mulai kerja">
                                                    </div>
                                                </div>
                                                @error('mulai kerja')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Selesai Kerja :</label>
                                                        <div class="input-group" id="timepicker" data-target-input="nearest">
                                                            <input type="time" class="form-control datetimepicker-input" data-target="#timepicker" name="selesai kerja">
                                                        </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <!-- /.form group -->
                                                @error('selesai kerjaa')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!--/Isi aktivitas-->
                                            <div class="form-group">
                                              <div class="col-sm-12">
                                                <label for="exampleInputEmail1">Aktivitas Harian :</label>
                                                <textarea type="text" class="form-control" id="exampleInputEmail1" rows="4" cols="500" name="aktivitas" placeholder="Isi aktifitas harian Anda..."></textarea>
                                                @error('aktivitas')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                              </div>
                                          </div>
                                        </div>
                                          <!-- /.input group -->
                                    </div>

                                        <!--tambah foto-->
                                        <div class="form-group" >
                                            <div class="col-sm-12">
                                                <label for="exampleInputEmail1">Bukti Foto</label>
                                                <input type="file" class="form-control" id="exampleInputEmail1" name="photo">
                                                @error('photo')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-danger">Kirim</button>
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



    <!--KODE DI BAWAH TIDAK DI GUNAKAN-->

    <!-- Main content -->
    <!-- /.content -->
    </div>
@endsection
