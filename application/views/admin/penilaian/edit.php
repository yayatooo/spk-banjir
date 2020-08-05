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
  <h1>Edit Data Penilaian</h1>
  <hr>
  <!-- DataTables Example -->
  <div class="row">
    <div class="col-md-8">
      <div class="card mb-3">
        <div class="card-body">
          <form action="<?=site_url('admin/penilaian/edit/'.$penilaian['alternatif']['id_alternatif']);?>" method="post">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <tbody>
                  <tr>
                    <td>Nama</td>
                    <td>
                      <input type="text" class="form-control" disabled value="<?=$penilaian['alternatif']['alternatif_nama'];?>">
                      <input type="hidden" name="alternatif_id" value="<?=$penilaian['alternatif']['id_alternatif'];?>">
                    </td>
                  </tr>
                  <tr>
                    <th class="text-center">Kriteria</th>
                    <th class="text-center">Subkriteria</th>
                  </tr>
                  <?php foreach($penilaian['penilaian'] as $key => $value): ?>
                  <tr>
                    <td><?=$value['kriteria_nama'];?></td>
                    <input type="hidden" name="kriteria[]" value="<?=$value['id_kriteria'];?>">
                    <input type="hidden" name="penilaian_id[]" value="<?=$value['penilaian_id'];?>">
                    <td>
                      <?php
                        $dataSubkriteria = $this->Penilaian_model->getSubkriteriaByKriteria($value['id_kriteria'])->result();
                        foreach ($dataSubkriteria as $value) {
                          $option[$key][$value->subkriteria_id] = $value->subkriteria_keterangan;
                        }
                      ?>
                      <?=form_dropdown('subkriteria[]', $option[$key], $penilaian['penilaian'][$key]['subkriteria_id'], 'class="form-control"');?>
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