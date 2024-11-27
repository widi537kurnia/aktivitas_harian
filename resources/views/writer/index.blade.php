@extends('layout.main_user')
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


                <!--tampilan pesan suksess-->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- form tambah aktivitas-->
                <form action="{{ route('writer.tambah-data-aktivitas') }}" method="POST" enctype="multipart/form-data">
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
                                                    @error('shift')
                                                    <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                            <!-- jam mulai dan jam pulang -->
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Mulai Kerja :</label>
                                                            <div class="input-group" id="timepicker" data-target-input="nearest">
                                                                <input type="time" class="form-control" name="mulai_kerja">
                                                            </div>
                                                        </div>
                                                        @error('mulai_kerja')
                                                            <small>{{ $message }}</small>
                                                        @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Selesai Kerja :</label>
                                                            <div class="input-group" id="timepicker" data-target-input="nearest">
                                                                <input type="time" class="form-control" name="selesai_kerja">
                                                            </div>
                                                        </div>
                                                        @error('selesai_kerja')
                                                            <small>{{ $message }}</small>
                                                        @enderror
                                                </div>

                                                    </div>
                                                    @error('shift')
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

                                              <div class="form-group" >
                                                <div class="col-sm-12 mt-4">
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
                                          </div>
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
                                        <!--tambah foto-->
<<<<<<< HEAD:resources/views/writer/index.blade.php
                                          <!-- /.input group -->
                                    </div>
                                    <!--/.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-danger">Kirim</button>
                                    </div>
=======
>>>>>>> role-user:resources/views/admin/index.blade.php
                                </form>
                            </div>
        </section>
    </div>
@endsection

