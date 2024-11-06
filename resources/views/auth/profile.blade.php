@extends('layout.main')
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
                        <img src="https://avatars.githubusercontent.com/u/134774984?v=4" alt="profile" class="img img-thumbnail rounded-circle w-50">
                        <h2>{{$data->name}}</h2>
                        <p class="card-text text-muted">
                            blabababababbbababbabababbabababababa
                        </p>
                        <button class="btn btn-warning btn-sm">
                            <i class="fas fa-pen"></i>
                            <a href="{{route('admin.edit-profile')}}">
                                Ubah profil
                            </a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow border rounded p-5 mb-4">
                    <h2>About Me</h2>

                    <p>aku pacar jeno aku pacar jeno aku pacar jeno aku pacar jeno aku pacar jeno aku pacar jeno
                         aku pacar jeno aku pacar jeno aku pacar jeno aku pacar jeno aku pacar jeno aku pacar jeno aku pacar jeno
                         aku pacar jeno aku pacar jeno
                    </p>
                </div>
                <div class="card shadow border rounded p-5 mb-4">
                    <h2>Contact</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="card-text">
                                <span class="text-muted mb-1 d-block">Alamat: </span>
                                <i class="fas fa-map text-warning mr-2"></i>
                                YAYAYAYAYAYYAAYYAYAYAYAYA
                            </p>
                            <p class="card-text">
                                <span class="text-muted mb-1 d-block">Alamat Email:</span>
                                <i class="fas fa-envelope text-warning mr-2"></i>
                                {{$data->email}}
                            </p>

                        </div>
                        <div class="col-lg-6">
                            <div>
                                Follow me:
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endif
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
