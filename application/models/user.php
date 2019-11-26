<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function get_user(){
		$query = $this->db->get('user');
		return $query->result_array(); //ngambil data yg udah array 
	}

	public function get_single($id)
	{
		$query = $this->db->query('SELECT * from user WHERE id_user='.$id);
		return $query->result();
	}

	public function insert($enc_password)
	{
		$data = array(
			'id_user' => '',
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $enc_password,
			'level' => $this->input->post('level')
		);

		$this->db->insert('user', $data);
	}

	public function update(){
		$data = array(
				'nama_anggota' => $this->input->post('nama'),
				'alamat_anggota' => $this->input->post('alamat'),
				'tempat_lahir_anggota' => $this->input->post('tempat'),
				'tanggal_lahir_anggota' => $this->input->post('tanggal'),
				'jk_anggota' => $this->input->post('jenis_kelamin')
			);

		$this->db->where('id_user',$id);
		$this->db->update('user', $data);
	}

	public function delete($id){
		$query = $this->db->query('DELETE from user WHERE id_user= '.$id);
	}

}