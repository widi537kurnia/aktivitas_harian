@extends('layout.main_user')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="mr-3">User</h1>
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
    <!-- Main content -->

    <section class="content">
        <div class="row pl-2">
            <div class="col-lg-4">
                <div class="card text-center p-5 shadow">
                    <div class="card-body">
                        @if($data)
                        <img src="{{asset('storage/photo-user/'.$data->image)}}" alt="profile" class="img img-thumbnail rounded-circle w-50" width="100">
                        <h2>{{$data->name}}</h2>
                        <p class="card-text text-muted">
                            {{$data->bio}}
                        </p>
                        <button class="btn btn-sm" style="background-color: rgb(231, 76, 60); color: white;">
                            <i class="fas fa-pen"></i>
                            <a href="{{route('writer.edit-profile')}}" class="text-white">
                                Ubah
                            </a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow border rounded p-5 mb-4 pl-3">
                    <h2>Pengguna</h2>
                    <p>
                        {{$data->about}}
                    </p>
                    <p class="card-text">
                        <span class="text-muted mb-1 d-block">Alamat Email :</span>
                        <i class="fas fa-envelope mr-2" style="color: rgb(231, 76, 60);"></i>
                        {{$data->email}}
                    </p>
                    <p class="card-text">
                        <span class="text-muted mb-1 d-block">Divisi :</span>
                        <i class="fas fa-envelope mr-2" style="color: rgb(231, 76, 60);"></i>
                        {{$data->divisi}}
                    </p>
                </div>
                <div class="card shadow border rounded p-5 mb-4">
                    <h2>See Us</h2>
                    <div class="row">
                        <div class="col-lg-6">
                        <p class="card-text">
                            <span class="text-muted mb-1 d-block">Alamat :</span>
                            <i class="fas fa-map mr-2" style="color: rgb(231, 76, 60);"></i>
                            Jl. Parangtritis km 5,6 Sewon, Bantul, DI Yogyakarta 55187
                        </p>
                        <p class="card-text">
                            <span class="text-muted mb-1 d-block">Website</span>
                            <a href="https://www.rumahmesin.com" target="_blank" class="text-decoration-none" style="color: rgb(231, 76, 60);">
                                <i class="fas fa-globe mr-2"></i>
                                https://www.rumahmesin.com
                            </a>

                        </p>

                        </div>
                        <div class="col-lg-6">
                            <div>
                                Follow Us:
                            </div>
                            <a href="https://instagram.com/rumahmesin" target="_blank" class="text-decoration-none link-danger fs-2">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://youtube.com/RumahMesin" target="_blank" class="text-decoration-none link-danger fs-2">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="https://www.tiktok.com/@rumahmesin" target="_blank" class="text-decoration-none link-danger fs-2">
                                <i class="fab fa-tiktok"></i>
                            </a>
                            <a href="https://www.facebook.com/rumah.mesin" target="_blank" class="text-decoration-none link-danger fs-2">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            @endif
        </div>
    </div>
    </section>
    <!-- /.content -->
</div>

@endsection
