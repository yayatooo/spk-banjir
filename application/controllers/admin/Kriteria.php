<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('status') != 'is_login') redirect('auth/login');
    $this->load->model('admin/Kriteria_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data = konfigurasi('Siswa');
    $data['kriteria'] = $this->Kriteria_model->getAll()->result_array();
    $this->template->load('admin/template/template', 'admin/kriteria/kriteria', $data);
  }

  public function add()
  {
    $data = konfigurasi('Kriteria');

    $this->form_validation->set_rules('kriteria_kode', 'Kode Kriteria', 'trim|required');
    $this->form_validation->set_rules('kriteria_nama', 'Nama Kriteria', 'trim|required');
    $this->form_validation->set_rules('kriteria_nilai', 'Nilai', 'trim|required|less_than[101]');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('admin/template/template', 'admin/kriteria/add', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'kriteria_kode'=>$post['kriteria_kode'],
        'kriteria_nama'=>$post['kriteria_nama'],
        'kriteria_nilai'=>$post['kriteria_nilai']/100
      ];

      if($this->Kriteria_model->insert($data)){
        $this->session->set_flashdata('pesan', '
          <script>
            toastr.success("Berhasil tambah kriteria")
          </script>
        ');
        redirect('admin/kriteria');
      }else{
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal. Silahkan coba lagi nanti.")
          </script>
        ');
        redirect('admin/kriteria');
      }
    }
  }

  public function edit($id = NULL)
  {
    if($id == NULL) redirect('admin/siswa');
    $data = konfigurasi('Kriteria');
    $data['kriteria'] = $this->Kriteria_model->getById($id)->row_array();

    $this->form_validation->set_rules('kriteria_kode', 'Kode Kriteria', 'trim|required');
    $this->form_validation->set_rules('kriteria_nama', 'Nama Kriteria', 'trim|required');
    $this->form_validation->set_rules('kriteria_nilai', 'Nilai', 'trim|required|less_than[101]');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('admin/template/template', 'admin/kriteria/edit', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'kriteria_kode'=>$post['kriteria_kode'],
        'kriteria_nama'=>$post['kriteria_nama'],
        'kriteria_nilai'=>$post['kriteria_nilai']/100
      ];

      if($this->Kriteria_model->update($id, $data)) {
        $this->session->set_flashdata('pesan', '
          <script>
            toastr.success("Berhasil edit kriteria.")
          </script>
        ');
        redirect('admin/kriteria');
      } else {
        $this->session->set_flashdata('pesan', '
          <script>
            toastr.error("Gagal edit kriteria.")
          </script>
        ');
        redirect('admin/kriteria');
      }
    }
  }

  public function delete($id = NULL)
  {
    if($id == NULL) redirect('admin/siswa');
    if($this->Kriteria_model->delete($id)) {
      $this->session->set_flashdata('pesan', '
        <script>
          toastr.success("Berhasil Hapus.")
        </script>
      ');
      redirect('admin/kriteria');
    } else {
      $this->session->set_flashdata('pesan', '
        <script>
          toastr.error("Gagal Hapus.")
        </script>
      ');
      redirect('admin/kriteria');
    }
  }

  // Bobot Kriteria

  public function bobot()
  {
    $data = konfigurasi('Siswa');
    $data['kriteria'] = $this->Kriteria_model->getAllBobot()->result_array();
    $this->template->load('admin/template/template', 'admin/kriteria/bobot', $data);
  }

  public function add_bobot()
  {
    $data = konfigurasi('Kriteria');

    $this->form_validation->set_rules('kriteria_kode', 'Kode Kriteria', 'trim|required|is_unique[kriteria.kriteria_kode]');
    $this->form_validation->set_rules('kriteria_nama', 'Nama Kriteria', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('admin/template/template', 'admin/kriteria/add_bobot', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'kriteria_kode'=>$post['kriteria_kode'],
        'kriteria_nama'=>$post['kriteria_nama']
      ];

      if($this->Kriteria_model->insert($data)){
        $this->session->set_flashdata('pesan', '
          <script>
            toastr.success("Berhasil tambah kriteria")
          </script>
        ');
        redirect('admin/kriteria/bobot');
      }else{
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal. Silahkan coba lagi nanti.")
          </script>
        ');
        redirect('admin/kriteria/bobot');
      }
    }
  }

  public function edit_bobot($id = NULL)
  {
    if($id == NULL) redirect('admin/siswa');
    $data = konfigurasi('Kriteria');
    $data['kriteria'] = $this->Kriteria_model->getById($id)->row_array();

    $this->form_validation->set_rules('kriteria_kode', 'Kode Kriteria', 'trim|required|is_unique[kriteria.kriteria_kode]');
    $this->form_validation->set_rules('kriteria_nama', 'Nama Kriteria', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('admin/template/template', 'admin/kriteria/edit', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'kriteria_kode'=>$post['kriteria_kode'],
        'kriteria_nama'=>$post['kriteria_nama']
      ];

      if($this->Kriteria_model->update($id, $data)) {
        $this->session->set_flashdata('pesan', '
          <script>
            toastr.success("Berhasil edit kriteria.")
          </script>
        ');
        redirect('admin/kriteria');
      } else {
        $this->session->set_flashdata('pesan', '
          <script>
            toastr.error("Gagal edit kriteria.")
          </script>
        ');
        redirect('admin/kriteria');
      }
    }
  }

  public function delete_bobot($id = NULL)
  {
    if($id == NULL) redirect('admin/siswa');
    if($this->Kriteria_model->delete($id)) {
      $this->session->set_flashdata('pesan', '
        <script>
          toastr.success("Berhasil Hapus.")
        </script>
      ');
      redirect('admin/kriteria');
    } else {
      $this->session->set_flashdata('pesan', '
        <script>
          toastr.error("Gagal Hapus.")
        </script>
      ');
      redirect('admin/kriteria');
    }
  }

  // SubKriteria

  public function subkriteria()
  {
    $data = konfigurasi('Siswa');
    $data['subkriteria'] = $this->Kriteria_model->getAllsubKriteria()->result_array();
    $this->template->load('admin/template/template', 'admin/kriteria/subkriteria', $data);
  }

  public function add_subkriteria()
  {
    $data = konfigurasi('Subkriteria');
    $dataKriteria = $this->Kriteria_model->getAll()->result();
    foreach ($dataKriteria as $value) {
      $kriteria[$value->kriteria_id] = $value->kriteria_nama;
    }
    $data['kriteriaDropdown'] = $kriteria;

    $this->form_validation->set_rules('kriteria', 'Kriteria', 'trim|required|is_unique[kriteria.kriteria_kode]');
    $this->form_validation->set_rules('subkriteria_keterangan', 'Keterangan', 'trim|required');
    $this->form_validation->set_rules('subkriteria_nilai', 'Nilai', 'trim|required|less_than[101]');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('admin/template/template', 'admin/kriteria/add_subkriteria', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'id_kriteria'=>$post['kriteria'],
        'subkriteria_keterangan'=>$post['subkriteria_keterangan'],
        'subkriteria_nilai'=>$post['subkriteria_nilai']/100
      ];

      if($this->Kriteria_model->insertSubkriteria($data)){
        $this->session->set_flashdata('pesan', '
          <script>
            toastr.success("Berhasil tambah Subkriteria")
          </script>
        ');
        redirect('admin/kriteria/subkriteria');
      }else{
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal. Silahkan coba lagi nanti.")
          </script>
        ');
        redirect('admin/kriteria/subkriteria');
      }
    }
  }

  public function edit_subkriteria($id = NULL)
  {
    if($id == NULL) redirect('admin/kriteria/subkriteria');
    $data = konfigurasi('Kriteria');
    $dataKriteria = $this->Kriteria_model->getAll()->result();
    foreach ($dataKriteria as $value) {
      $kriteria[$value->kriteria_id] = $value->kriteria_nama;
    }
    $data['kriteriaDropdown'] = $kriteria;
    $data['kriteria'] = $this->Kriteria_model->getSubkriteriaById($id)->row_array();

    $this->form_validation->set_rules('kriteria', 'Kriteria', 'trim|required|is_unique[kriteria.kriteria_kode]');
    $this->form_validation->set_rules('subkriteria_keterangan', 'Keterangan', 'trim|required');
    $this->form_validation->set_rules('subkriteria_nilai', 'Nilai', 'trim|required|less_than[101]');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('admin/template/template', 'admin/kriteria/edit_subkriteria', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'id_kriteria'=>$post['kriteria'],
        'subkriteria_keterangan'=>$post['subkriteria_keterangan'],
        'subkriteria_nilai'=>$post['subkriteria_nilai']/100
      ];

      if($this->Kriteria_model->updateSubkriteria($id, $data)) {
        $this->session->set_flashdata('pesan', '
          <script>
            toastr.success("Berhasil edit Subkriteria.")
          </script>
        ');
        redirect('admin/kriteria/subkriteria');
      } else {
        $this->session->set_flashdata('pesan', '
          <script>
            toastr.error("Gagal. Silahkan coba lagi nanti.")
          </script>
        ');
        redirect('admin/kriteria/subkriteria');
      }
    }
  }

  public function delete_subkriteria($id = NULL)
  {
    if($id == NULL) redirect('admin/kriteria/subkriteria');
    if($this->Kriteria_model->deleteSubkriteria($id)) {
      $this->session->set_flashdata('pesan', '
        <script>
          toastr.success("Berhasil Hapus.")
        </script>
      ');
      redirect('admin/kriteria/subkriteria');
    } else {
      $this->session->set_flashdata('pesan', '
        <script>
          toastr.error("Gagal Hapus.")
        </script>
      ');
      redirect('admin/kriteria/subkriteria');
    }
  }

}

/* End of file Siswa.php */