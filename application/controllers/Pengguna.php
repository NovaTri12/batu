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

}