<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

  private $_countInsert = 0;

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('status') != 'is_login') redirect('auth/login');
    $this->load->model('admin/Penilaian_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data = konfigurasi('Penilaian');
    $data['penilaian'] = $this->Penilaian_model->getAll()->result_array();
    $this->template->load('admin/template/template', 'admin/penilaian/penilaian', $data);
  }

  public function add()
  {
    $data = konfigurasi('Alternatif');

    $dataAlternatif = $this->Penilaian_model->getAlternatif()->result();
    foreach ($dataAlternatif as $value) {
      $alternatif[$value->alternatif_id] = $value->alternatif_nama;
    }
    $data['dropAlternatif'] = $alternatif;

    $dataKriteria = $this->Penilaian_model->getKriteria()->result();
    foreach ($dataKriteria as $value) {
      $kriteria[$value->kriteria_id] = $value->kriteria_nama;
    }
    $data['dropKriteria'] = $kriteria;

    $this->form_validation->set_rules('alternatif_id', 'Nama', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('admin/template/template', 'admin/penilaian/add', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);

      for ($i=0; $i < count($post['kriteria']); $i++) { 
        $data[$i] = [
          'id_alternatif'=>$post['alternatif_id'],
          'id_kriteria'=>$post['kriteria'][$i],
          'id_subkriteria'=>$post['subkriteria'][$i]
        ];
        $this->Penilaian_model->insert($data[$i]);
        $this->_countInsert++;
      }

      if($this->_countInsert == 5){
        $this->session->set_flashdata('pesan', '
          <script>
            toastr.success("Berhasil insert penilaian")
          </script>
        ');
        redirect('admin/penilaian');
      }else{
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal. Silahkan coba lagi nanti.")
          </script>
        ');
        redirect('admin/penilaian');
      }
    }
  }

  public function edit($id = NULL)
  {
    if($id == NULL) redirect('admin/penilaian');
    $data = konfigurasi('Alternatif');
    $data['penilaian'] = $this->Penilaian_model->getById($id);
    // var_dump($data['penilaian']);die;
   
    $dataKriteria = $this->Penilaian_model->getKriteria()->result();
    foreach ($dataKriteria as $value) {
      $kriteria[$value->kriteria_id] = $value->kriteria_nama;
    }
    $data['dropKriteria'] = $kriteria;

    foreach ($dataKriteria as $value) {
      $kriteria[$value->kriteria_id] = $value->kriteria_nama;
    }
    $data['dropKriteria'] = $kriteria;

    $this->form_validation->set_rules('alternatif_id', 'Nama', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('admin/template/template', 'admin/penilaian/edit', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);

      for ($i=0; $i < count($post['kriteria']); $i++) { 
        $data[$i] = [
          'id_alternatif'=>$post['alternatif_id'],
          'id_kriteria'=>$post['kriteria'][$i],
          'id_subkriteria'=>$post['subkriteria'][$i]
        ];
        $this->Penilaian_model->update($post['alternatif_id'], $post['penilaian_id'][$i], $data[$i]);
        $this->_countInsert++;
      }

      if($this->_countInsert == count($post['kriteria'])){
        $this->session->set_flashdata('pesan', '
          <script>
            toastr.success("Berhasil insert penilaian")
          </script>
        ');
        redirect('admin/penilaian');
      }else{
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal. Silahkan coba lagi nanti.")
          </script>
        ');
        redirect('admin/penilaian');
      }
    }
  }

  public function detail($id = NULL)
  {
    if($id == NULL) redirect('admin/siswa');
    $data['title'] = 'Detail Siswa';
    $data['siswa'] = $this->Penilaian_model->getById($id)->row_array();
    $this->template->load('admin/template/template', 'admin/siswa/detail', $data);
  }

  public function delete($id = NULL)
  {
    if($id == NULL) redirect('admin/penilaian');
    if($this->Penilaian_model->delete($id)) {
      $this->session->set_flashdata('pesan', '
        <script>
          toastr.success("Berhasil Hapus.")
        </script>
      ');
      redirect('admin/penilaian');
    } else {
      $this->session->set_flashdata('pesan', '
        <script>
          toastr.error("Gagal Hapus.")
        </script>
      ');
      redirect('admin/penilaian');
    }
  }

}

/* End of file Siswa.php */