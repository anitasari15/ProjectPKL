<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reservasi extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('ruangan_model');
		$this->load->model('reservasi_model');
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}

	public function index(){

		// load db and model
        $this->load->database();
 
        // init params
        $params = array();
        $limit_per_page = 5;
        $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $total_records = $this->reservasi_model->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $params["results"] = $this->reservasi_model->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] = base_url() . 'admin/reservasi/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 4;

            $config['full_tag_open'] 	= '<nav><ul class="pagination justify-content-center">';
			$config['full_tag_close'] 	= '</ul></nav>';

			$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['num_tag_close'] 	= '</span></li>';

			$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';

			$config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';

			$config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close'] 	= '</span></li>';

			$config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';

			$config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close'] 	= '</span></li>';

            
            $this->pagination->initialize($config);
             
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }
        
        $this->load->view('template/header'); 
        $this->load->view('admin/tampil_reservasi', $params);
	}

	public function create()
	{

		$data = array();
		$data['data'] = $this->ruangan_model->get_file();

		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('template/header');
			$this->load->view('admin/tambah_reservasi', $data);
		} else {
			if ($this->input->post('simpan')) {
				$this->reservasi_model->insert();
				$this->session->set_flashdata('notif_reservasi_buat', 'Data reservasi berhasil dibuat');
				redirect('admin/reservasi');
			}
			$this->load->view('template/header');
			$this->load->view('admin/tampil_reservasi');
		}
	}

	public function edit($id){
		$data = array();
		$this->load->helper('form');
		$data['data'] = $this->ruangan_model->get_file();
		$data['anggota'] = $this->user_model->get_file();
		$data['reservasi'] = $this->reservasi_model->get_reservasi($id);

		if($this->input->post('edit')){
			$this->reservasi_model->edit($id);
			$this->session->set_flashdata('notif_reservasi_edit', 'Data reservasi berhasil diedit');
			redirect('admin/reservasi');
		}
		$this->load->view('template/header');
		$this->load->view('admin/edit_reservasi', $data);
	}

	public function delete($id){
		$this->load->model('reservasi_model');
		$this->reservasi_model->hapus($id);
		$this->session->set_flashdata('notif_reservasi_hapus', 'Data reservasi berhasil dihapus');
		redirect('admin/reservasi');
	}
}
