<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
  <li class="breadcrumb-item">
      <a href="<?=site_url('admin/dashboard');?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
      Hasil
    </li>
  </ol>

  <!-- Page Content -->
  <h1>HASIL Penilaian</h1>
  <hr>
  <?=$this->session->flashdata('pesan');?>
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <span>
        Matriks Keputusan
      </span>
      
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th rowspan="2" class="text-center">Alternatif</th>
              <th colspan="<?=count($kriteria)+1;?>" class="text-center">Kriteria</th>
            </tr>
            <tr>
              <?php foreach($kriteria as $k): ?>
              <th><?=$k['kriteria_nama'];?></th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach($hasil as $h): ?>
            <tr>
              <td><?=$h['alternatif_nama'];?></td>
              <?php $value = $this->Hasil_model->getSubkriteriaById($h['id_alternatif'])->result_array();?>
              <?php foreach($value as $v): ?>
              <td><?=$v['subkriteria_nilai']*100;?></td>
              <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-header">
      <span>
        Normalisasi Matriks Keputusan
      </span>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th rowspan="2" class="text-center">Alternatif</th>
              <th colspan="<?=count($kriteria);?>" class="text-center">Kriteria</th>
            </tr>
            <tr>
              <?php foreach($kriteria as $k): ?>
              <th><?=$k['kriteria_nama'];?></th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach($hasil as $h): ?>
            <tr>
              <td><?=$h['alternatif_nama'];?></td>
              <?php $value = $this->Hasil_model->getSubkriteriaById($h['id_alternatif'])->result_array();?>
              <?php foreach($value as $v): ?>
              <?php $nilai = $this->Hasil_model->getPenilaianByKriteria($v['id_kriteria']); ?>
              <td><?=normalisasi($v['subkriteria_nilai'], $nilai)*100;?></td>
              <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-header">
      <span>
        Perangkingan
      </span>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th rowspan="2" class="text-center">Ranking</th>
              <th rowspan="2" class="text-center">Alternatif</th>
              <th colspan="<?=count($kriteria);?>" class="text-center">Kriteria</th>
              <th rowspan="2" class="text-center">Hasil</th>
            </tr>
            <tr>
              <?php foreach($kriteria as $k): ?>
              <th><?=$k['kriteria_nama'];?></th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
          <?php foreach($hasil as $h): ?>
          <tr>
            <td><?php $hasil = 0;?></td>
            <td><?=$h['alternatif_nama'];?></td>
            <?php $value = $this->Hasil_model->getSubkriteriaById($h['id_alternatif'])->result_array();?>
            <?php foreach($value as $v): ?>
            <?php $nilai = $this->Hasil_model->getPenilaianByKriteria($v['id_kriteria']); ?>
            <td><?=(normalisasi($v['subkriteria_nilai'], $nilai)*$this->Hasil_model->getKriteriaById($v['id_kriteria'])->row()->kriteria_nilai)*100;?></td>
            <?php $hasil = normalisasi($v['subkriteria_nilai'], $nilai)*$this->Hasil_model->getKriteriaById($v['id_kriteria'])->row()->kriteria_nilai + $hasil; ?>
            <?php endforeach; ?>
            <td><?=$hasil*100;?></td>
          </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
      Berikut hasil dari pengujian <?=$alternatif;?> alternatif
    </div>
  </div>

</div>