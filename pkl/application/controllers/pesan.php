<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pesan extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('ruangan_model');
		$this->load->model('model_pesan');
		
	}

	public function index()
	{
		$data['data'] = $this->ruangan_model->get_file();
		$this->load->view('user/reservasi', $data);
	}

	public function list()
	{
		$data['data'] = $this->ruangan_model->get_file();
		$this->load->view('user/daftar_ruangan', $data);
	}

	public function create($id)
	{

		$data = array();
		$data['data'] = $this->ruangan_model->get_ruang($id);
		$this->load->view('user/reservasi', $data);
	}

	public function masukan()
	{
		$data = array();
		$this->load->helper(array('form', 'url'));

		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('user/reservasi');
		} else {
			if ($this->input->post('simpan')) {
				$this->model_pesan->insert();
				$this->session->set_flashdata('notif_reservasi', 'Reservasi berhasil dilakukan, menunggu persetejuan dari Admin');
				redirect('home');
			}
		}
	}
}