<?php

class App extends CI_CONTROLLER{
	
	function __construct(){
		parent::__construct();
	}

	function index(){
		if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){
			//Halaman dashboard

			if($this->session->userdata('level') == 1 ){
				
				echo "Halaman Admin";
			
			}elseif($this->session->userdata('level') == 2){
				echo "Halaman OPerator";
			}

		}else{
			redirect('auth/login','refresh');
		}
	}

	function hallonama($id = null){
		if (!isset($id)){
			echo "variabel kosong";	
		}else{
			echo "hallo " .$id;
		}
	}
}