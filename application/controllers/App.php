<?php

class App extends CI_CONTROLLER{
	
	function __construct(){
		parent::__construct();
	}

	function index(){
		echo "hallo";
	}

	function hallonama($id = null){
		if (!isset($id)){
			echo "variabel kosong";	
		}else{
			echo "hallo " .$id;
		}
	}
}