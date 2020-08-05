<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Auth_model');
  }
  
  public function index()
  {
    redirect('auth/login');
  }

  public function login()
  {
    if($this->session->userdata('status') == 'is_login') redirect('admin/dashboard');
    $data = konfigurasi('Login');
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('login', $data);
    } else {
      $post = $this->input->post(NULL, TRUE);

      if($this->Auth_model->getByUsername($post['username'])->num_rows() > 0) {
        
        $user = $this->Auth_model->getByUsername($post['username'])->row_array();
        if(!password_verify($post['password'], $user['password'])) {
          $this->session->set_flashdata('notif', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>MAAF!</strong> Kata sandi salah.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          ');
          redirect('auth/login');
        }
        
        $this->session->set_userdata([
          'status'=>'is_login',
          'id'=>$user['id'],
          'username'=>$user['username']
        ]);
        redirect('admin/dashboard');
        
      } else {
        $this->session->set_flashdata('notif', '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>MAAF!</strong> Username tidak terdaftar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        ');
        redirect('auth/login');
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth/login');
  }

}

/* End of file Auth.php */
