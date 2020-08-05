<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  
	  $this->load->model('admin/Hasil_model');
	}
	
	public function index()
	{
		$data = konfigurasi('Hasil');
		$data['kriteria'] = $this->Hasil_model->getKriteria()->result_array();
		$data['hasil'] = $this->Hasil_model->get()->result_array();
		$data['alternatif'] = $this->Hasil_model->getAlternatif()->num_rows();
	 
		$this->load->view('frontend/layout/home.php',$data);
	}
}
