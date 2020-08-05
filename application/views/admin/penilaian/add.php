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
      Tambah Penilaian
    </li>
  </ol>

  <!-- Page Content -->
  <h1>Tambah Data Penilaian</h1>
  <hr>
  <!-- DataTables Example -->
  <div class="row">
    <div class="col-md-8">
      <div class="card mb-3">
        <div class="card-body">
          <form action="<?=site_url('admin/penilaian/add');?>" method="post">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <tbody>
                  <tr>
                    <td>Nama</td>
                    <td>
                      <?=form_dropdown('alternatif_id', $dropAlternatif, set_value('alternatif_id'), 'class="form-control"');?>
                    </td>
                  </tr>
                  <tr>
                    <th class="text-center">Kriteria</th>
                    <th class="text-center">Subkriteria</th>
                  </tr>
                  <?php foreach($dropKriteria as $key => $value): ?>
                  <tr>
                    <td><?=$value;?></td>
                    <input type="hidden" name="kriteria[]" value="<?=$key;?>">
                    <td>
                      <?php
                        $dataSubkriteria = $this->Penilaian_model->getSubkriteriaByKriteria($key)->result();
                        foreach ($dataSubkriteria as $value) {
                          $option[$key][$value->subkriteria_id] = $value->subkriteria_keterangan;
                        }
                      ?>
                      <?=form_dropdown('subkriteria[]', $option[$key], set_value('alternatif_id'), 'class="form-control"');?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
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