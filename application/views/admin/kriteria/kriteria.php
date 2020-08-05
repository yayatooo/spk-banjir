<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
  <li class="breadcrumb-item">
      <a href="<?=site_url('admin/dashboard');?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
      Kriteria
    </li>
  </ol>

  <!-- Page Content -->
  <h1>Data Kriteria</h1>
  <hr>
  <?=$this->session->flashdata('pesan');?>
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <span>
        Data Kriteria
      </span>
      <span class="float-right">
        <a class="btn btn-sm btn-primary" href="<?=site_url('admin/kriteria/add');?>"><i class="fas fa-plus-circle"></i> Tambah data kriteria</a>
      </span>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode</th>
              <th>Nama</th>
              <th>Nilai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php if(count($kriteria) > 0): ?>
            <?php $no = 1; ?>
            <?php foreach($kriteria as $s): ?>
            <tr>
              <td><?=$no++;?></td>
              <td><?=$s['kriteria_kode'];?></td>
              <td><?=$s['kriteria_nama'];?></td>
              <td><?=$s['kriteria_nilai']*100;?></td>
              <td>
                <a href="<?=site_url('admin/kriteria/edit/'.$s['kriteria_id']);?>" title="Edit"><i class="fas fa-edit"></i></a>
                <a onclick="return confirm('Apakah Anda Yakin?');" href="<?=site_url('admin/kriteria/delete/'.$s['kriteria_id']);?>" title="Delete"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>