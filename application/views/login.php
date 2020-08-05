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
  <link href="<?=base_url('assets/');?>vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('assets/');?>css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login - <?=$site['nama_aplikasi'];?></div>
      <div class="card-body">
        <form action="<?=site_url('auth/login');?>" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="test" name="username" id="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
              <label for="username">Username</label>
            </div>
            <?=form_error('username', '<small class="form-text text-danger">', '</small>');?>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
              <label for="password">Password</label>
            </div>
            <?=form_error('password', '<small class="form-text text-danger">', '</small>');?>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <?=$this->session->flashdata('notif');?>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/');?>js/jquery.min.js"></script>
  <script src="<?=base_url('assets/');?>js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/');?>js/jquery.easing.min.js"></script>

</body>

</html>
