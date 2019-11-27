<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrMeja extends CI_Controller {

  public function __construct()
  { 
    parent::__construct();
    $this->load->model('meja');
    $this->load->library('form_validation');
  }

  public function index(){
  	$data['meja'] = $this->meja->get_file();
  	$this->load->view('template/header');
  	$this->load->view('viewMeja', $data);
  }

  public function tambah(){
  	$data = array();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_meja', 'no_meja', 'required');
		$this->form_validation->set_rules('jumlah_kursi', 'jumlah_kursi', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('template/header');
			$this->load->view('addMeja');
		}else{
			if($this->input->post('simpan')){
				$this->meja->insert(md5($this->input->post('password')));
			redirect('ctrMeja');
			}
			// var_dump($data);
			$this->load->view('template/header');
			$this->load->view('addMeja');
		}
  }

  	public function edit($id){
  		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['data'] = $this->meja->get_meja($id);

		if($this->input->post('edit')){
			$this->meja->update($id);
			redirect('ctrMeja');
		}
		
		$this->load->view('template/header');
		$this->load->view('editMeja',$data);
  	}

  	public function delete($id){
		$this->meja->delete($id);
		redirect('ctrMeja');
	}
}