<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=$title;?></title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url('assets');?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="<?=base_url('assets');?>/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Page level plugin CSS-->
  <link href="<?=base_url('assets');?>/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?=base_url('assets');?>/css/sb-admin.css" rel="stylesheet">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?=base_url('assets/vendor');?>/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?=base_url('assets/vendor');?>/toastr/toastr.min.css">
  <!-- End CSS -->

  <script src="<?=base_url('assets');?>/vendor/jquery/jquery.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?=base_url('assets/vendor');?>/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="<?=base_url('assets/vendor');?>/toastr/toastr.min.js"></script>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?=site_url('admin/dashboard');?>"><?=$site['nama_aplikasi'];?></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </div>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i> <?=$this->session->userdata('username');?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?=site_url('admin/profil');?>">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('admin/dashboard');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-list"></i>
          <span>Kriteria</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?=site_url('admin/kriteria');?>">Kriteria</a>
          <a class="dropdown-item" href="<?=site_url('admin/kriteria/subkriteria');?>">Subkriteria</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('admin/alternatif');?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Alternatif</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('admin/penilaian');?>">
          <i class="fas fa-fw fa-clipboard-check"></i>
          <span>Penilaian</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('admin/hasil');?>">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>Hasil</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('admin/konfigurasi');?>">
          <i class="fas fa-fw fa-cog"></i>
          <span>Konfigurasi</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <?=$this->session->flashdata('notif');?>
      <!-- Contents -->
      <?=$contents;?>
      <!-- End COntents -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © <?=$site['nama_aplikasi'].' '.date('Y');?></span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=site_url('auth/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets');?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets');?>/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Page level plugin JavaScript-->
  <script src="<?=base_url('assets');?>/vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?=base_url('assets');?>/vendor/datatables/dataTables.bootstrap4.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets');?>/js/sb-admin.min.js"></script>
  <!-- Demo scripts for this page-->
  <script src="<?=base_url('assets');?>/js/demo/datatables-demo.js"></script>
  <script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });

    $(document).ready(function() {
      $('#dataTable2').DataTable();
    });

    $(document).ready(function() {
        var t = $('#dataTable3').DataTable( {
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ <?=$jumlahKolom;?>, 'desc' ]]
        } );
    
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
  </script>

</body>

</html>
