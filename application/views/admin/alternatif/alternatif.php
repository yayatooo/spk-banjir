<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
  <li class="breadcrumb-item">
      <a href="<?=site_url('admin/dashboard');?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
      Alternatif
    </li>
  </ol>

  <!-- Page Content -->
  <h1>Data Wilayah</h1>
  <hr>
  <?=$this->session->flashdata('pesan');?>
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <span>
        Data Wilayah Potensi Banjir
      </span>
      <span class="float-right">
        <a class="btn btn-sm btn-primary" href="<?=site_url('admin/alternatif/add');?>"><i class="fas fa-plus-circle"></i> Tambah data alternatif</a>
      </span>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Wilayah</th>
              <th>Kode Wilayah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php if(count($alternatif) > 0): ?>
            <?php $no = 1; ?>
            <?php foreach($alternatif as $s): ?>
            <tr>
              <td><?=$no++;?></td>
              <td><?=$s['alternatif_nama'];?></td>
              <td><?=$s['alternatif_nik'];?></td>
              <td>
                <a href="<?=site_url('admin/alternatif/detail/'.$s['alternatif_id']);?>" title="Detail"><i class="fas fa-eye"></i></a>
                <a href="<?=site_url('admin/alternatif/edit/'.$s['alternatif_id']);?>" title="Edit"><i class="fas fa-edit"></i></a>
                <a href="<?=site_url('admin/alternatif/delete/'.$s['alternatif_id']);?>" title="Delete" onclick="return confirm('Apakah Anda Yakin?');"><i class="fas fa-trash"></i></a>
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