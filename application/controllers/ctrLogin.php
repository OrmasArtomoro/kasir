<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrLogin extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('dataLogin');
	}

	public function index(){
		$this->load->view('login');
	}

	public function cek_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('ctrLogin');
		} else {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$id_user = $this->dataLogin->login($email, $password);
			// var_dump($id_user);
			// die();
			if ($id_user) {
				$level = $this->dataLogin->get_user($id_user);
				$nama = $this->dataLogin->get_user($id_user);
				$user_data = array(
					'id_user' => $id_user,
					'email' => $email,
					'nama' => $nama[0]->nama,
					'logged_in' => true,
					'level' => $level[0]->level
				);

				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('user_loggedin', 'You are now logged in');
				// redirect('admin');
				if ($this->session->userdata('level') == 1) {
					redirect('welcome');
				} else if ($this->session->userdata('level') == 2) {
					redirect('welcome');
				} 
				
			} else {
				$this->session->set_flashdata('login_failed', 'Login Failed');
				redirect('ctrLogin');
			}

		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('user_loggedout', 'You are logged out');

		redirect('ctrLogin');
	}
}