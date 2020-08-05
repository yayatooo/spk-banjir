<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('status') != 'is_login') redirect('auth/login');
    $this->load->library('form_validation');
  }
  
  public function index()
  {
    redirect('admin/konfigurasi/aplikasi');
  }

  public function aplikasi()
  {
    $data = konfigurasi('Konfigurasi Aplikasi');

    $this->form_validation->set_rules('nama_aplikasi', 'Nama Aplikasi', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      $this->template->load('admin/template/template', 'admin/konfigurasi/aplikasi', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = [
        'nama_aplikasi'=>$post['nama_aplikasi'],
      ];

      if($this->Konfigurasi_model->update($data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil update.")
          </script>
        ');
        redirect('admin/konfigurasi/aplikasi');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("GAGAL! Silahkan coba lagi nanti.")
          </script>
        ');
        redirect('admin/konfigurasi/aplikasi');
      }
    }
  }

}

/* End of file Konfigurasi.php */
