@extends('layout.main_admin')
 @section('content')

 <div class="content-wrapper">
  <!-- Content Header (Page Header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard Admin</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard Admin</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-school"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Sekolah</span>
              <span class="info-box-number">41,410</span>
              <div class="progress">
                <div class="progress-bar bg-info" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-6">
          <div class="info-box">
            <span class="info-box-icon bg-olive"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Anak Magang</span>
              <span class="info-box-number">41,410</span>
              <div class="progress">
                <div class="progress-bar bg-olive" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-user-shield"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Admin</span>
              <span class="info-box-number">41,410</span>
              <div class="progress">
                <div class="progress-bar bg-info" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection
