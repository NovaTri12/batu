<?php

class Riwayat extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
    }
    function tambah($id = null){
        if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){
        //dropdown menu mesin
                if(isset($id)){
                    $data['id_batu'] = $id;
                    $data['mesin'] = $this->appmodel->_option('mesin','id_mesin','nama_mesin') ; 
                    $this->load->view('backend/batu/form/tambahriwayat',$data);
                }else{
                    echo "error";
                }
        }else{
            echo "UNKNOWN ERROR";
        }
    }
    function aksitambah(){
        if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){
			//Halaman dashboard

			if($this->session->userdata('level') == 1 ){
                //json success massage

                $data = array(
					'id_batu'	=> $this->input->post('id_batu'),
					'tgl_penggunaan' => $this->input->post('tgl_penggunaan'),
                    'jam_mulai' => $this->input->post('jam_mulai'),
                    'jam_selesai' => $this->input->post('jam_selesai'),
                    'id_pengguna'   => $this->session->userdata('id_pengguna'),
                    'waktu_penggunaan'  => sumTime($this->input->post('jam_mulai'),$this->input->post('jam_selesai')),
                    'soft_delete'	=> '0',
                    'id_mesin'      => $this->input->post('id_mesin')
				);

				//echo json_encode($data);
				$a = $this->db->insert('penggunaan_batu',$data);
                //$a = sumTime($data['jam_mulai'],$data['jam_selesai']); 
                //echo $a;
				if($a){
					$pesan = array(
						'status'	=> 'success',
						'pesan'		=> 'Data berhasil ditambahkan');
				}else{
					$pesan = array(
						'status'	=> 'failed',
						'pesan'		=> 'Data gagal ditambahkan');
				}
                    echo json_encode($pesan);
            }else{
                //json fail massage
                $pesan = array(
                    'status'	=> 'failed',
                    'pesan'		=> 'Data gagal ditambahkan');
                    echo json_encode($pesan);
                }

        }else{
        //json massage
                $pesan = array(
                    'status'	=> 'failed',
                    'pesan'		=> 'Data gagal ditambahkan');
                }
                
    }
}