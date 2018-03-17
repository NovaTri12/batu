<?php
class Pengguna extends CI_CONTROLLER{
	function __construct(){
		parent::__construct();
	}
	function index(){
	//daftar list pengguna
		if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){

			
			
		}else{
			redirect('auth/login','refresh');
		}
	}
	function detil(){

	}

	function edit($id = null){
		if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){
			if(isset($id)){
				$this->db->where(array('id_pengguna'=>$id));
				$a = $this->db->get('pengguna')->num_rows();

				if($a > 0){
					// edit username
					$this->db->join('level','level.id_level = pengguna.id_level','inner');
					$this->db->where(array('pengguna.id_pengguna'=> $id));
					$data['detil'] = $this->db->get('pengguna')->row();
					$data['level'] = $this->appmodel->_option('level','id_level','level') ;
					$this->load->view('backend/header/header');
					$this->load->view('backend/pengguna/editpengguna',$data);
					$this->load->view('backend/footer/footer');
				}else{
					redirect('pengguna','refresh');
				}
			}else{
				redirect('auth/login','refresh');
			}
			
		}else{
			redirect('auth/login','refresh');
		}


	}

}