<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ruangan extends CI_Controller {

  public function __construct()
  { 
    parent::__construct();
    $this->load->model('ruangan_model');
    $this->load->library('form_validation');
  }

  public function index(){
    // load db and model
        $this->load->database();
 
        // init params
        $params = array();
        $limit_per_page = 5;
        $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $total_records = $this->ruangan_model->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $params["results"] = $this->ruangan_model->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] = base_url() . 'admin/ruangan/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 4;

            $config['full_tag_open']  = '<nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav>';

            $config['num_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']  = '</span></li>';

            $config['cur_tag_open']   = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']  = '<span class="sr-only">(current)</span></span></li>';

            $config['next_tag_open']  = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';

            $config['prev_tag_open']  = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span></li>';

            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';

            $config['last_tag_open']  = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';

            
            $this->pagination->initialize($config);
             
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }
        
        $this->load->view('template/header'); 
        $this->load->view('admin/tampil_ruang', $params);
  }

  public function create()
  {
    $this->form_validation->set_rules('nama_ruangan','nama_ruangan','required|is_unique[ruangan.nama_ruangan]');
    
    if($this->form_validation->run() == FALSE){
      $this->load->view('template/header');
      $this->load->view('admin/tambah_ruang');
    } else {
      if ($this->input->post('simpan')) {
              $upload = $this->ruangan_model->upload();

            if ($upload['result'] == 'success') {
              $this->ruangan_model->insert($upload);
              $this->session->set_flashdata('notif_ruangan_buat', 'Data ruangan berhasil dibuat');
              redirect('admin/ruangan');
              }else{
              $data['message'] = $upload['error'];
              }
            }
    }
  }

  public function edit($id){
    $this->load->helper('form');

    $data['ruang'] = $this->ruangan_model->get_ruang($id);

    if($this->input->post('edit')){
      $this->ruangan_model->edit($id);
      $this->session->set_flashdata('notif_ruangan_edit', 'Data ruangan berhasil diedit');
      redirect('admin/ruangan');
    }
    $this->load->view('template/header');
    $this->load->view('admin/edit_ruang', $data);
  }

  public function delete($id){
    $this->load->model('ruangan_model');
    $this->ruangan_model->hapus($id);
    $this->session->set_flashdata('notif_ruangan_hapus', 'Data ruangan berhasil dihapus');
    redirect('admin/ruangan');
  }
}
