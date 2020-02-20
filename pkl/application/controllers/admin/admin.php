<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('reservasi_model');
		$this->load->model('ruangan_model');
		$this->load->model('user_model');
	}

	public function index()
	{
		$data ['jml_reservasi'] = $this->reservasi_model->countallreservasi();
		$data ['jml_ruangan'] = $this->ruangan_model->countallruangan();
		$data ['jml_user'] = $this->user_model->countalluser();
		$this->load->view('template/header');
		$this->load->view('admin/home', $data);		
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */