<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?=site_url('admin/dashboard');?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="<?=site_url('admin/alternatif');?>">Alternatif</a>
    </li>
    <li class="breadcrumb-item">
      Edit Alternatif
    </li>
  </ol>

  <!-- Page Content -->
  <h1>Edit Data Wilayah</h1>
  <hr>
  <!-- DataTables Example -->
  <div class="row">
    <div class="col-md-8">
      <div class="card mb-3">
        <div class="card-header">
          <span>
            Data wilayah berpotensi banjir
          </span>
        </div>
        <div class="card-body">
          <form action="<?=site_url('admin/alternatif/edit/'.$alternatif['alternatif_id']);?>" method="post">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <tbody>
                  <tr>
                    <td>Kode Wilayah</td>
                    <td>
                      <input type="text" class="form-control" name="alternatif_nik" value="<?=$alternatif['alternatif_nik'];?>">
                      <?=form_error('alternatif_nik', '<small class="form-text text-danger">', '</small>');?>
                    </td>
                  </tr>
                  <tr>
                    <td>Nama Wilayah</td>
                    <td>
                      <input type="text" class="form-control" name="alternatif_nama" value="<?=$alternatif['alternatif_nama'];?>">
                      <?=form_error('alternatif_nama', '<small class="form-text text-danger">', '</small>');?>
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