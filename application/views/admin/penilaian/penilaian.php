<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
  <li class="breadcrumb-item">
      <a href="<?=site_url('admin/dashboard');?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
      Penilaian
    </li>
  </ol>

  <!-- Page Content -->
  <h1>Data Penilaian Alternatif</h1>
  <hr>
  <?=$this->session->flashdata('pesan');?>
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <span>
        Data Penilaian wilayah berpotensi banjir
      </span>
      <span class="float-right">
        <a class="btn btn-sm btn-primary" href="<?=site_url('admin/penilaian/add');?>"><i class="fas fa-plus-circle"></i> Tambah data alternatif</a>
      </span>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php if(count($penilaian) > 0): ?>
            <?php $no = 1; ?>
            <?php foreach($penilaian as $s): ?>
            <tr>
              <td><?=$no++;?></td>
              <td><?=$s['alternatif_nama'];?></td>
              <td>
                <a href="<?=site_url('admin/penilaian/edit/'.$s['id_alternatif']);?>" title="Edit"><i class="fas fa-edit"></i></a>
                <a href="<?=site_url('admin/penilaian/delete/'.$s['id_alternatif']);?>" title="Delete" onclick="return confirm('Apakah Anda Yakin?');"><i class="fas fa-trash"></i></a>
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