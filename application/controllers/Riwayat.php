<?php

class Riwayat extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
    }
    function tambah(){
        //dropdown menu mesin
        $data['mesin'] = $this->appmodel->_option('mesin','id_mesin','nama_mesin') ; 
       $this->load->view('backend/batu/form/tambahriwayat',$data);
    }
    function aksitambah(){
        if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){
			//Halaman dashboard

			if($this->session->userdata('level') == 1 ){
                //json success massage

            }else{
                //json fail massage
            }
        }else{
        //json massage

        }
    }
}