<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('status') != 'is_login') redirect('auth/login');
    $this->load->library('form_validation');
    $this->load->model('admin/Profil_model');
  }

  public function index()
  {
    $data = konfigurasi('Dashboard');
    $data['profil'] = $this->db->get_where('user', ['id'=>1])->row_array();

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Kata Sandi', 'trim');
    $this->form_validation->set_rules('password2', 'Konfirmasi Kata Sandi', 'callback_konfirmasi');

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('admin/template/template', 'admin/profil', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);
      $data = ['username'=>$post['username']];
      if($post['password']) {
        $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
      }
      if ($this->Profil_model->update($data)) {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.success("Berhasil edit profil")
          </script>
        ');
        redirect('admin/profil');
      } else {
        $this->session->set_flashdata('notif', '
          <script>
            toastr.error("Gagal edit profil")
          </script>
        ');
        redirect('admin/profil');
      }
    }
  }

  public function konfirmasi()
  {
    if($this->input->post('password', TRUE)) {
      if ($this->input->post('password', TRUE) != $this->input->post('password2', TRUE)) {
        $this->form_validation->set_message('konfirmasi', 'Kata sandi dan Konfirmasi kata sandi harus sama');
        return FALSE;
      } else {
        return TRUE;
      }
    }else{
      return TRUE;
    }
  }

}

/* End of file Profil.php */
