<?php

class Auth extends CI_CONTROLLER{

    function __construct(){
        parent::__construct();
    }

    function index(){
       // $a = new $this->session();

        if($this->session->userdata('username',TRUE)&& $this->session->userdata('level',TRUE)){

        }else{
           redirect('auth/login','refresh');
        }
    }
    function login(){
        if ($this->session->userdata('username',TRUE) && $this->session->userdata('user_id',TRUE) && $this->session->userdata('remote_ip',TRUE) && $this->session->userdata['level']=='1'){ 

        //redirect('backend','refresh');
        }else{
        
        }	
            $data['username'] =  $this->input->post('username',true);
            $data['password'] =  $this->input->post('password',true);	
            $this->load->view('login/login',$data);
        }
}