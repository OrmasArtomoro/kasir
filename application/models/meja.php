<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class meja extends CI_Model {

public function get_file(){
		$query = $this->db->get('meja');
		return $query->result();
	}

	public function get_meja($id)
	{
		$query = $this->db->query('SELECT * from meja WHERE id_meja='.$id);
		return $query->result();
	}

	public function insert(){
		$data = array(
     		'no_meja' => $this->input->post('no_meja'),
     		'jumlah_kursi' => $this->input->post('jumlah_kursi'),
     		'status' => $this->input->post('status')
 	      );
 // Insert user
 	      return $this->db->insert('meja', $data);
	}

	public function update($id){
		$data = array(
				'no_meja' => $this->input->post('no_meja'),
				'jumlah_kursi' => $this->input->post('jumlah_kursi'),
				'status' => $this->input->post('status')
			);
		
		$this->db->where('id_meja',$id);
		$this->db->update('meja', $data);
	}

	public function delete($id){
		$query = $this->db->query('DELETE from meja WHERE id_meja= '.$id);
	}

}