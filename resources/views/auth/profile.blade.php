@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
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
        <div class="card card-danger card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="">
              </div>
              @if($data)
              <h3 class="profile-username text-center">{{ $data->name}}</h3>
              <p class="text-muted text-center">---</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Sekolah</b> <a class="float-right">Mana aja</a>
                </li>
                <li class="list-group-item">
                  <b>Divisi</b> <a class="float-right">Web</a>
                </li>
                <li class="list-group-item">
                  <b>Ntar dulu</b> <a class="float-right">Ya</a>
                </li>
              </ul>
              @endif
              <div class="float-sm-right">
              <a href="#" class="btn btn-danger mt-3">Edit</a>
              <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Logout</a>
              </div>
            </div>
            <!-- /.card-body -->
          </div>

    </section>
    <!-- /.content -->
</div>

@endsection
