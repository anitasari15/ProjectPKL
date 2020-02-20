<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dataLogin');
	}

	public function index()
	{
		$this->load->view('login/tampil_login');		
	}

	public function cek_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!'
			));
		$this->form_validation->set_rules('password', 'Password', 'required',
			array(
				'required' 		=> 'kolom %s tidak boleh kosong!!!!!!!'
			));

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('login/tampil_login');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			// echo $username."<br>";
			// echo $password;
			// die();
			// $level = $this->input->post('level');

			$id_user = $this->dataLogin->login($username, $password);
			// var_dump($id_user);
			// die();
			if ($id_user) {
				$level = $this->dataLogin->get_user($id_user);
				$nama = $this->dataLogin->get_user($id_user);
				$user_data = array(
					'id' => $id_user,
					'username' => $username,
					'nama' => $nama[0]->nama,
					'logged_in' => true,
					'level' => $level[0]->id_level
				);

				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('user_loggedin', 'You are now logged in');
				// redirect('admin');
				if ($this->session->userdata('level') == 1) {
					redirect('admin/admin');
				} else if ($this->session->userdata('level') == 2) {
					redirect('home');
				} 
				
			} else {
				$this->session->set_flashdata('login_failed', 'Login Failed');
				redirect('login');
			}

		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('user_loggedout', 'You are logged out');

		redirect('login');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */