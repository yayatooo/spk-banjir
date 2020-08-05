<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?=site_url('admin/dashboard');?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="<?=site_url('admin/konfigurasi');?>">Konfigurasi</a>
    </li>
    <li class="breadcrumb-item active">
      Aplikasi
    </li>
  </ol>

  <!-- Page Content -->
  <h1>Konfigurasi Aplikasi</h1>
  <hr>
  <!-- DataTables Example -->
  <div class="row">
    <div class="col-md-8">

      <div class="card mb-3">
        <div class="card-header">

        </div>
        <div class="card-body">
          <form action="<?=site_url('admin/konfigurasi/aplikasi');?>" method="post">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                  <tr>
                    <td>Nama Aplikasi</td>
                    <td>
                      <input class="form-control" type="text" name="nama_aplikasi" id="nama_aplikasi" value="<?=$site['nama_aplikasi'];?>">
                      <?=form_error('nama_aplikasi', '<small class="form-text text-danger">', '</small>');?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <button type="submit" class="btn btn-primary">Sumbit</button>
          </form>

        </div>
      </div>

    </div>
  </div>
</div>