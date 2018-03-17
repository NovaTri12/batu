<?php

class Riwayat extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
    }
    function tambah(){
       $this->load->view('backend/batu/form/tambahriwayat');
    }
}