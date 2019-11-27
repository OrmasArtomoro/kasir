<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu extends CI_Model {

public function get_file(){
		$query = $this->db->get('menu');
		return $query->result();
	}

	public function get_data(){
		$query = $this->db->get('menu');
		return $query->result_array(); //ngambil data yg udah array 
	}

	public function get_menu($id)
	{
		$query = $this->db->query('SELECT * from menu WHERE id_menu='.$id);
		return $query->result();
	}

	public function upload()
	{
		$config['upload_path'] 		= './uploads/';
		$config['allowed_types'] 	= 'jpg|jpeg|png';
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
     		'nama_menu' => $this->input->post('nama_menu'),
     		'deskripsi' => $this->input->post('deskripsi'),
     		'harga' => $this->input->post('harga'),
     		'gambar' => $upload['file']['file_name']
 	      );
 // Insert user
 	      return $this->db->insert('menu', $data);
	}

	public function delete($id){
		$query = $this->db->query('DELETE from menu WHERE id_menu= '.$id);
	}

	public function edit($id){
		$data = array(
				'nama_menu' => $this->input->post('nama_menu'),
				'deskripsi' => $this->input->post('deskripsi'),
				'harga' => $this->input->post('harga')
	     		// 'gambar' => $post_image
			);

		if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
    		{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
    			$config['upload_path']          = './uploads/';
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
					$this->load->view('editMenu', $data); 

    	        } else {

    	        	// Hapus file image yang lama jika ada
    	        	if( !empty($old_image) ) {
    	        		if ( file_exists( './uploads/'.$old_image ) ){
    	        		    unlink( './uploads/'.$old_image );
    	        		} else {
    	        		    echo 'File tidak ditemukan.';
    	        		}
    	        	}

    	        	// Simpan nama file-nya jika berhasil diupload
    	            $img_data = $this->upload->data();
    	            $post_image = $img_data['file_name'];
    	        	
    	        	$data['gambar'] = $post_image;
    	        }
    		} else {

    			// User tidak upload gambar, jadi kita kosongkan field ini, atau jika sudah ada, gunakan image sebelumnya
    			if(isset($_FILES['gambar']) == ''){
					unset($data['gambar']);
				}

    		}

		// $data = array(
		// 		'nama_menu' => $this->input->post('nama_menu'),
		// 		'deskripsi' => $this->input->post('deskripsi'),
		// 		'harga' => $this->input->post('harga'),
	 //     		'gambar' => $post_image
		// 	);
		
		$this->db->where('id_menu',$id);
		$this->db->update('menu', $data);
	}

}