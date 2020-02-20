<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}

	public function index(){

		$this->load->database();
        $this->load->model('user_model');
 
        // init params
        $params = array();
        $limit_per_page = 5;
        $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $total_records = $this->user_model->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $params["results"] = $this->user_model->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] = base_url() . 'admin/user/index';
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
        $this->load->view('admin/tampil_user', $params);
	}

	public function create()
	{
		$this->form_validation->set_rules('username','Username','required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
 		$this->form_validation->set_rules('password2', 'Konfirmasi Password','matches[password]');

		if($this->form_validation->run() === FALSE){
		$this->load->view('template/header');
		$this->load->view('admin/tambah_user');
 		} else {

 		$enc_password = md5($this->input->post('password'));

		$this->user_model->insert($enc_password);
		$this->session->set_flashdata('notif_user_buat', 'Data user berhasil dibuat');
		redirect('admin/user');
 		}
	}

	public function edit($id){
		$this->load->helper('form');

		$data['anggota'] = $this->user_model->get_user($id);

		if($this->input->post('edit')){
			$enc_password=md5($this->input->post('password'));
			$this->user_model->edit($id,$enc_password);
			$this->session->set_flashdata('notif_user_edit', 'Data user berhasil diedit');
			redirect('admin/user');
		}
		$this->load->view('template/header');
		$this->load->view('admin/edit_user',$data);
	}

	public function delete($id){
		$this->load->model('user_model');
		$this->user_model->hapus($id);
		$this->session->set_flashdata('notif_user_hapus', 'Data user berhasil dihapus');
		redirect('admin/user');
	}

	public function delete($id){
		$this->user->delete($id);
		redirect('ctrUser');
	}
}
