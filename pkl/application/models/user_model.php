<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {
	public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("user");
 
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
        return $this->db->count_all("user");
    }

	public function get_file(){
		$query = $this->db->get('user');
		return $query->result();
	}

	public function get_user($id)
	{
		$query = $this->db->query('SELECT * from User WHERE id='.$id);
		return $query->result();
	}

	public function insert($enc_password)
	{
	
		$data = array(
     		'nama' => $this->input->post('nama'),
     		'divisi' => $this->input->post('divisi'),
     		'username' => $this->input->post('username'),
     		'password' => $enc_password,
     		'email' => $this->input->post('email'),
     		'id_level' => $this->input->post('level')
 	      );
 	      return $this->db->insert('user', $data);
	}

	public function edit($id,$enc_password){
		if($this->input->post('password') == ""){
			$data = array(
				'nama' => $this->input->post('nama'),
				'divisi' => $this->input->post('divisi'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
     			'id_level' => $this->input->post('level')
			);
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'divisi' => $this->input->post('divisi'),
				'username' => $this->input->post('username'),
				'password' => $enc_password,
				'email' => $this->input->post('email'),
     			'id_level' => $this->input->post('level')
			);
		}
		$this->db->where('id',$id);
		$this->db->update('user', $data);
	}

	public function hapus($id){
		$query = $this->db->query('DELETE from user WHERE id='.$id);
	}

	public function countalluser()
	{
		$query = $this->db->query('select count(*) as jumlah from user');
		return $query->result();
	}

}