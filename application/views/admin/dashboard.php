<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item active">
      <a href="<?=site_url('admin/dashboard');?>">Dashboard</a>
    </li>
  </ol>

  <!-- Page Content -->
  <h1>Dashboard</h1>
  <hr>
  <h4 class="text-center mb-5">
    Selamat Datang, <span class="text-success"><?=$this->session->userdata('username');?></span><br>
    di Sistem Pendukung Keputusan resiko terjadinya banjir berbasis web menggunakan metode <span class="text-success">Simple Additive Weighting</span>
  </h4>

  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-users"></i>
          </div>
          <div class="mr-5"><?=$alternatif;?> Data Alternatif</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="<?=site_url('admin/alternatif');?>">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-list"></i>
          </div>
          <div class="mr-5"><?=$kriteria;?> Kriteria</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="<?=site_url('admin/kriteria');?>">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-list-alt"></i>
          </div>
          <div class="mr-5"><?=$subkriteria;?> Sub Kriteria</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="<?=site_url('admin/kriteria/subkriteria');?>">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
  </div>
        

</div>