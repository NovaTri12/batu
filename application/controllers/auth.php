<?php


class Auth extends CI_CONTROLLER{

    function __construct(){
        parent::__construct();
    }

    function index(){
       // $a = new $this->session();

        if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){
            redirect('app','refresh');
        }else{
            redirect('auth/login','refresh');
        }
    }
    function login(){
        if ($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){ 

        redirect('app','refresh');
        }else{
            $data['username'] =  $this->input->post('username',true);
            $data['password'] =  $this->input->post('password',true);	
            $this->load->view('login/login',$data);
        }	
            
        }
   
    function processlogin(){
        $data = array(
                'username'      => $this->input->post('username'),
                'password'      => md5($this->input->post('password'))
            );
        $this->db->join('level','pengguna.id_level = level.id_level','inner');
        $this->db->where(array('username' => $data['username'],'password'=> $data['password']));
        $a = $this->db->get('pengguna');

        if($a->num_rows() == 1){
            //echo 'login berhasil';
            $id_pengguna = $a->row()->id_pengguna;
            $level       = $a->row()->id_level;
            $username    = $a->row()->username;

            $this->session->set_userdata('id_pengguna',$id_pengguna);
            $this->session->set_userdata('username',$username);
            $this->session->set_userdata('level',$level);
            //redirect('app','refresh');
            $msg = array(
                'status' => 'success',
                'pesan'  => 'Login Berhasil'
            );
            echo json_encode($msg);
        }else{
            $msg = array(
                'status' => 'failed',
                'pesan'  => 'Login Gagal'
            );
            echo json_encode($msg);
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('auth/login','refresh');
    }
}