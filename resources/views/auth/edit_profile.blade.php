@extends('layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="mr-3">Edit Profile</h1>
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
            <div class="row pl-2">
              <div class="col-12">
                <!-- Card Form -->
                <a href="{{ route('admin.profile') }}" class="btn mb-3" style="background-color: rgb(231, 76, 60); color: white;">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">
                    <b>
                        Edit your profile here!
                    </b>
                    </h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.update-profile')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @if ($data)
                        <div class="row">
                            <div class="col-md-6 mb-3">
                              <label for="disabledTextInput" class="form-label">Nama</label>
                              <input type="text" id="disabledTextInput" class="form-control" name="name" placeholder="Nama" value="{{$data->name}}">
                            </div>
                            <div class="col-md-6 mb-3">
                              <label for="disabledTextInput" class="form-label">Email</label>
                              <input type="email" id="disabledTextInput" class="form-control" name="email" placeholder="Email" value="{{$data->email}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                              <label for="disabledTextInput" class="form-label">Bio</label>
                              <input type="text" id="disabledTextInput" class="form-control" name="bio" placeholder="Your Bio" value="{{$data->bio}}">
                            </div>
                            <div class="col-md-6 mb-3">
                              <label for="disabledTextInput" class="form-label">About Me</label>
                              <input type="text" id="disabledTextInput" class="form-control" name="about" placeholder="Tell them about" value="{{$data->about}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                              <label for="disabledTextInput" class="form-label">Password</label>
                              <input type="password" id="disabledTextInput" class="form-control" name="password">
                            </div>
                            <div class="col-md-6 mb-3">
                              <label for="imageUpload" class="form-label">Choose an Image</label>
                              <input type="file" class="form-control" id="imageUpload" name="photo">
                            </div>
                        </div>
                        <button type="submit" style="background-color: rgb(231, 76, 60); color: white;" class="btn">Submit</button>
                        @endif
                    </form>
                  </div>
                </div>
                <!-- End of Card Form -->
              </div>
            </div>
          </section>
    </div>
@endsection
