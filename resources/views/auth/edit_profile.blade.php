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
              <div class="col-lg-8">
                <!-- Card Form -->
                <a href="{{ route('admin.profile') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Edit your profile here!</h4>
                  </div>
                  <div class="card-body">
                    <form>
                      <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Bio</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Your Bio">
                      </div>
                      <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">About Me</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Tell them about">
                      </div>
                      <div class="mb-3">
                        <label for="imageUpload" class="form-label">Choose an Image</label>
                        <input type="file" class="form-control" id="imageUpload" name="image" accept="image/*">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
                <!-- End of Card Form -->
              </div>
            </div>
          </section>
    </div>
@endsection
