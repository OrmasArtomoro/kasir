<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrUser extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('user');
	}

	public function index(){
		$data['user'] = $this->user->get_user();
		$this->load->view('template/header');
		$this->load->view('viewUser', $data);
	}

	public function tbhUser(){
		$data = array();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('template/header');
			$this->load->view('addUser');
		}else{
			if($this->input->post('simpan')){
				$this->user->insert(md5($this->input->post('password')));
			redirect('ctrUser');
			}
			// var_dump($data);
			$this->load->view('template/header');
			$this->load->view('addUser');
		}
	}
	
	public function edit($id){	
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['user'] = $this->user->get_single($id);

		if($this->input->post('edit')){
			$this->user->update($id);
			redirect('ctrUser');
		}
		

		$this->load->view('editUser',$data);
	}

	public function delete($id){
		$this->user->delete($id);
		redirect('ctrUser');
	}
}