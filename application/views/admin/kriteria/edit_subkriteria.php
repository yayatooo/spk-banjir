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
      Edit Subkriteria
    </li>
  </ol>

  <!-- Page Content -->
  <h1>Edit Data Subkriteria</h1>
  <hr>
  <!-- DataTables Example -->
  <div class="row">
    <div class="col-md-8">
      <div class="card mb-3">
        <div class="card-body">
          <form action="<?=site_url('admin/kriteria/edit_subkriteria/'.$kriteria['subkriteria_id']);?>" method="post">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <tbody>
                  <tr>
                    <td>Kriteria</td>
                    <td>
                      <?= form_dropdown('kriteria', $kriteriaDropdown, $kriteria['id_kriteria'], 'class="form-control"');?>
                      <?=form_error('kriteria', '<small class="form-text text-danger">', '</small>');?>
                    </td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td>
                      <input type="text" class="form-control" name="subkriteria_keterangan" value="<?=$kriteria['subkriteria_keterangan'];?>">
                      <?=form_error('subkriteria_keterangan', '<small class="form-text text-danger">', '</small>');?>
                    </td>
                  </tr>
                  <tr>
                    <td>Nilai</td>
                    <td>
                      <input type="number" class="form-control" name="subkriteria_nilai" value="<?=$kriteria['subkriteria_nilai']*100;?>">
                      <?=form_error('subkriteria_nilai', '<small class="form-text text-danger">', '</small>');?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>