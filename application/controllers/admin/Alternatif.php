<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('status') != 'is_login') redirect('auth/login');
    $this->load->model('admin/Alternatif_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data = konfigurasi('Alternatif');
    $data['alternatif'] = $this->Alternatif_model->getAll()->result_array();
    $this->template->load('admin/template/template', 'admin/alternatif/alternatif', $data);
  }

  public function add()
  {
    $data = konfigurasi('Alternatif');

    $this->form_validation->set_rules('alternatif_nik', 'NIK', 'trim|required|numeric');
    $this->form_validation->set_rules('alternatif_nama', 'Nama', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('admin/template/template', 'admin/alternatif/add', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'alternatif_nik'=>$post['alternatif_nik'],
        'alternatif_nama'=>$post['alternatif_nama']
      ];

      if($this->Alternatif_model->insert($data)){
        $this->session->set_flashdata('pesan', '
          <script>
            toastr.success("Berhasil insert data")
          </script>
        ');
        redirect('admin/alternatif');
      }else{
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal. Silahkan coba lagi nanti.")
          </script>
        ');
        redirect('admin/alternatif');
      }
    }
  }

  public function edit($id = NULL)
  {
    if($id == NULL) redirect('admin/siswa');
    $data = konfigurasi('Alternatif');
    $data['alternatif'] = $this->Alternatif_model->getById($id)->row_array();

    $this->form_validation->set_rules('alternatif_nik', 'NIK', 'trim|required|numeric');
    $this->form_validation->set_rules('alternatif_nama', 'Nama', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('admin/template/template', 'admin/alternatif/edit', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'alternatif_nik'=>$post['alternatif_nik'],
        'alternatif_nama'=>$post['alternatif_nama']
      ];

      if($this->Alternatif_model->update($id, $data)){
        $this->session->set_flashdata('pesan', '
          <script>
            toastr.success("Berhasil edit data")
          </script>
        ');
        redirect('admin/alternatif');
      }else{
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal. Silahkan coba lagi nanti.")
          </script>
        ');
        redirect('admin/alternatif');
      }
    }
  }

  public function detail($id = NULL)
  {
    if($id == NULL) redirect('admin/siswa');
    $data['title'] = 'Detail Siswa';
    $data['siswa'] = $this->Alternatif_model->getById($id)->row_array();
    $this->template->load('admin/template/template', 'admin/siswa/detail', $data);
  }

  public function delete($id = NULL)
  {
    if($id == NULL) redirect('admin/alternatif');
    if($this->Alternatif_model->delete($id)) {
      $this->session->set_flashdata('pesan', '
        <script>
          toastr.success("Berhasil Hapus.")
        </script>
      ');
      redirect('admin/alternatif');
    } else {
      $this->session->set_flashdata('pesan', '
        <script>
          toastr.error("Gagal Hapus.")
        </script>
      ');
      redirect('admin/alternatif');
    }
  }

}

/* End of file Siswa.php */