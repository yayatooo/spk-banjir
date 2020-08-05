<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('status') != 'is_login') redirect('auth/login');
    $this->load->model('admin/Hasil_model');
  }
  
  public function index()
  {
    $data = konfigurasi('Hasil');
    $data['kriteria'] = $this->Hasil_model->getKriteria()->result_array();
    $data['hasil'] = $this->Hasil_model->get()->result_array();
    $data['alternatif'] = $this->Hasil_model->getAlternatif()->num_rows();
    $this->template->load('admin/template/template', 'admin/hasil', $data);
  }

}

/* End of file Hasil.php */
