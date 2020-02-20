<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('reservasi_model');
		$this->load->model('beranda');
		$this->load->model('ruangan_model');
		$this->load->library('pagination');
		$this->load->helper('url');
	}

	public function index()
	{
		// load db and model
        $this->load->database();
        $this->load->model('model_pesan');
 
        // init params
        $params = array();
        $limit_per_page = 7;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->model_pesan->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $params["ruangan"] = $this->ruangan_model->get_file();
            $params["results"] = $this->model_pesan->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] = base_url() . 'home/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

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
         
        $this->load->view('user/home', $params);
	}

	public function hasil()
	{
		// load db and model
        $this->load->database();
 
        // init params
        $params = array();
        $limit_per_page = 7;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->beranda->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $params["ruangan"] = $this->ruangan_model->get_file();
            $params["results"] = $this->beranda->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] = base_url() . 'home/hasil/index';
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
         
        $this->load->view('user/hasil', $params);
	}
}