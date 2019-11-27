<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrMenu extends CI_Controller {

  public function __construct()
  { 
    parent::__construct();
    $this->load->model('menu');
    $this->load->library('form_validation');
  }

  public function index(){
  	$data['data'] = $this->menu->get_file();
  	$this->load->view('template/header');
  	$this->load->view('viewMenu',$data);
  }

  public function create(){
  	$this->form_validation->set_rules('nama_menu','nama_ruangan','required');
    
    if($this->form_validation->run() == FALSE){
      $this->load->view('template/header');
      $this->load->view('addMenu');
    } else {
      if ($this->input->post('simpan')) {
              $upload = $this->menu->upload();

            if ($upload['result'] == 'success') {
              $this->menu->insert($upload);
              redirect('ctrMenu');
              }else{
              $data['message'] = $upload['error'];
              }
            }
    }
  }

  	public function delete($id){
		$this->menu->delete($id);
		redirect('ctrMenu');
	} 

	public function edit($id){
    $this->load->helper('form');

    $data['data'] = $this->menu->get_menu($id);

    if($this->input->post('edit')){
      $this->menu->edit($id);
      redirect('ctrMenu');
    }
    $this->load->view('template/header');
    $this->load->view('editMenu', $data);
  }
}