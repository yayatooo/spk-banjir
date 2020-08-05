<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('status') != 'is_login') redirect('auth/login');
  }
  
  public function index()
  {
    $data = konfigurasi('Dashboard');
    $this->template->load('admin/template/template', 'admin/dashboard', $data);
  }

}

/* End of file Dashboard.php */
