<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ruangan_model extends CI_Model {
	public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("ruangan");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total() 
    {
        return $this->db->count_all("ruangan");
    }

	public function get_file(){
		$query = $this->db->get('ruangan');
		return $query->result();
	}

	public function get_ruang($id)
	{
		$query = $this->db->query('SELECT * from ruangan WHERE id_ruangan='.$id);
		return $query->result();
	}

	public function upload()
	{
		$config['upload_path'] 		= './upload/';
		$config['allowed_types'] 	= 'jpg';
		$config['max_size']  		= '2000';
		$config['remove_space'] 	= TRUE;
		$config['overwrite']		= TRUE;
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('gambar')){
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insert($upload)
	{
	
		$data = array(
     		'nama_ruangan' => $this->input->post('nama_ruangan'),
     		'klasifikasi' => $this->input->post('klasifikasi'),
     		'letak' => $this->input->post('letak'),
     		'fasilitas' => $this->input->post('fasilitas'),
     		'kapasitas' => $this->input->post('kapasitas'),
     		'gambar' => $upload['file']['file_name']
 	      );
 // Insert user
 	      return $this->db->insert('ruangan', $data);
	}

	public function edit($id){
		if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
    		{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
    			$config['upload_path']          = './upload/';
    	        $config['allowed_types']        = '*';
    	        $config['max_size']             = 200000000;
    	        $config['overwrite']			= TRUE;
    	        $config['remove_space']  		= TRUE;

    	        // Load library upload
    	        $this->load->library('upload', $config);

    	        // Apakah file berhasil diupload?
    	        if ( ! $this->upload->do_upload('gambar'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();

    	        	$post_image = '';

    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
    	            $this->load->view('template/header');
					$this->load->view('admin/tambah_ruang', $data); 

    	        } else {

    	        	// Hapus file image yang lama jika ada
    	        	if( !empty($old_image) ) {
    	        		if ( file_exists( './upload/'.$old_image ) ){
    	        		    unlink( './upload/'.$old_image );
    	        		} else {
    	        		    echo 'File tidak ditemukan.';
    	        		}
    	        	}

    	        	// Simpan nama file-nya jika berhasil diupload
    	            $img_data = $this->upload->data();
    	            $post_image = $img_data['file_name'];
    	        	
    	        }
    		} else {

    			// User tidak upload gambar, jadi kita kosongkan field ini, atau jika sudah ada, gunakan image sebelumnya
    			if(isset($_FILES['gambar']) == ''){
					unset($data['gambar']);
				}

    		}

		$data = array(
				'nama_ruangan' => $this->input->post('nama_ruangan'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'letak' => $this->input->post('letak'),
				'fasilitas' => $this->input->post('fasilitas'),
	     		'kapasitas' => $this->input->post('kapasitas'),
	     		'gambar' => $post_image
			);
		
		$this->db->where('id_ruangan',$id);
		$this->db->update('ruangan', $data);
	}

	public function hapus($id){
		$row = $this->db->where('id_ruangan',$id)->get('ruangan')->row();

		$this->db->where('id_ruangan', $id);

		unlink('upload/'.$row->gambar);

		$this->db->delete('ruangan', array('id_ruangan' => $id));
	}

	public function countallruangan()
	{
		$query = $this->db->query('select count(*) as jumlah from ruangan');
		return $query->result();
	}
	

}