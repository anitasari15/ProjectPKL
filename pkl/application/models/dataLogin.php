<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataLogin extends CI_Model {

	public function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$result = $this->db->get('user');

		if ($result->num_rows() == 1) {
			return $result->row(0)->id;
		} else {
			return false;
		}
	}	

	public function get_user($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id', $id_user);
		return $this->db->get()->result();
	}

}

/* End of file dataLogin.php */
/* Location: ./application/models/dataLogin.php */