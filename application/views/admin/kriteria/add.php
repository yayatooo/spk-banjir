<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?=site_url('admin/dashboard');?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="<?=site_url('admin/kriteria');?>">Kriteria</a>
    </li>
    <li class="breadcrumb-item">
      Tambah Kritria
    </li>
  </ol>

  <!-- Page Content -->
  <h1>Tambah Data Kritria</h1>
  <hr>
  <!-- DataTables Example -->
  <div class="row">
    <div class="col-md-8">
      <div class="card mb-3">
        <div class="card-body">
          <form action="<?=site_url('admin/kriteria/add');?>" method="post">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <tbody>
                  <tr>
                    <td>Kode Kriteria</td>
                    <td>
                      <input type="text" class="form-control" name="kriteria_kode" value="<?=set_value('kriteria_kode');?>">
                      <?=form_error('kriteria_kode', '<small class="form-text text-danger">', '</small>');?>
                    </td>
                  </tr>
                  <tr>
                    <td>Nama Kriteria</td>
                    <td>
                      <input type="text" class="form-control" name="kriteria_nama" value="<?=set_value('kriteria_nama');?>">
                      <?=form_error('kriteria_nama', '<small class="form-text text-danger">', '</small>');?>
                    </td>
                  </tr>
                  <tr>
                    <td>Nilai</td>
                    <td>
                      <input type="number" class="form-control" name="kriteria_nilai" value="<?=set_value('kriteria_nilai');?>">
                      <?=form_error('kriteria_nilai', '<small class="form-text text-danger">', '</small>');?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>