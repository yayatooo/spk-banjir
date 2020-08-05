<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?=site_url('admin/dashboard');?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="<?=site_url('admin/penilaian');?>">Penilaian</a>
    </li>
    <li class="breadcrumb-item">
      Edit Penilaian
    </li>
  </ol>

  <!-- Page Content -->
  <h1>Edit Profil</h1>
  <hr>
  <!-- DataTables Example -->
  <div class="row">
    <div class="col-md-8">
      <div class="card mb-3">
        <div class="card-body">
          <form action="<?=site_url('admin/profil');?>" method="post" autocomplete="off">
            <div class="form-group">
              <label for="username">Username</label>
              <input class="form-control" type="text" name="username" id="username" value="<?=$profil['username'];?>">
              <?=form_error('username', '<small class="form-text text-danger">', '</small>');?>
            </div>
            <div class="form-group">
              <label for="password">Kata Sandi</label>
              <input autocomplete="off" class="form-control" type="password" name="password" id="password">
              <?=form_error('password', '<small class="form-text text-danger">', '</small>');?>
            </div>
            <div class="form-group">
              <label for="password2">Konfirmasi Kata Sandi</label>
              <input class="form-control" type="password" name="password2" id="password2">
              <?=form_error('password2', '<small class="form-text text-danger">', '</small>');?>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>