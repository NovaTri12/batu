<?php

class App extends CI_CONTROLLER{
	
	function __construct(){
		parent::__construct();
	}

	function index(){
		if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){
			//Halaman dashboard

			if($this->session->userdata('level') == 1 ){
				
				//echo "Halaman Admin";
				$this->load->view('backend/header/header');
				$this->load->view('backend/beranda/beranda');
				$this->load->view('backend/footer/footer');
			}elseif($this->session->userdata('level') == 2){
				$this->load->view('backend/header/header');
				$this->load->view('backend/beranda/beranda');
				$this->load->view('backend/footer/footer');
			}

		}else{
			redirect('auth/login','refresh');
		}
	}
	function refbatutambah(){
		if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){

			if($this->session->userdata('level')== 1){
				
				$data = array(
						'tipe_batu' => $this->input->post('tipe_batu')
					);
					if(!empty($data['tipe_batu'])){
					$a = $this->db->insert('tipe_batu',$data);

					if($a){
						$msg = array(
							'status' => 'success',
							'pesan'  => 'Data Berhasil Ditambahkan'
						);
						echo json_encode($msg);
					}else{
						$msg = array(
							'status' => 'failed',
							'pesan'  => 'data gagal ditambah'
						);
						echo json_encode($msg);
					}
					//========================
					}else{
						$msg = array(
							'status' => 'empty',
							'pesan'  => 'Data Kosong'
						);
						echo json_encode($msg);
					}
				}
			}
		}
	
	function tambahbatu(){
		if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){
			if($this->session->userdata('level')== 1){
				//form tambah batu
				$this->load->view('backend/header/header');
				$this->load->view('backend/batu/tambahbatu');
				$this->load->view('backend/footer/footer');
			}
		}
	}

	public function uploadgambar(){
        $config['upload_path'] = './assets/images/upload';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
 
        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload('file')){
            $status = "error";
            $msg = $this->upload->display_errors();
        }
        else{
            $dataupload = $this->upload->data();
            $status = "success";
            $msg = $dataupload['file_name']." berhasil diupload";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
    }

	function batu(){
		if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){
			if($this->session->userdata('level')== 1){
				$this->db->join('tipe_batu','tipe_batu.id_tipebatu = batu.id_tipebatu','inner');
				$data['isi'] = $this->appmodel->gettable('batu');
				$this->load->view('backend/header/header');
				$this->load->view('backend/batu/listadmin',$data);
				$this->load->view('backend/footer/footer');

			}elseif($this->session->userdata('level')== 2){
				$this->db->join('tipe_batu','tipe_batu.id_batu = batu.id_batu','inner');
				$data['isi'] = $this->appmodel->gettable('batu');
				$this->load->view('backend/header/header');
				$this->load->view('backend/batu/listops',$data);
				$this->load->view('backend/footer/footer');
			}
		}
	}
	function simpanbatu(){
		$config['upload_path'] = './assets/images/upload';
        $config['allowed_types'] = 'gif|jpg|png';
       // $config['max_size']  = '1000';
        //$config['max_width']  = '1024';
        //$config['max_height']  = '768';
		// Upload file firs
		$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('file')){
            $status = "error";
            $msg = $this->upload->display_errors();
        	}
        	else{
            $dataupload = $this->upload->data();
            $status = "success";
			//$msg = $dataupload['file_name']." berhasil diupload";
			
			//masukkan ke DataBase
				$data = array(
					'nama_batu'	=> $this->input->post('nmBatu'),
					'id_tipebatu' => $this->input->post('tpBatuVal'),
					'foto'			=> $dataupload['file_name'],
					'tgl_input'		=> date('Y-m-d')
				);

				//echo json_encode($data);
				$a = $this->db->insert('batu',$data);

				if($a){
					$pesan = array(
						'status'	=> 'success',
						'pesan'		=> 'Data berhasil ditambahkan');
				}else{
					$pesan = array(
						'status'	=> 'failed',
						'pesan'		=> 'Data gagal ditambahkan');
				}
			}
		echo json_encode($pesan);
	   // $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
	
	}
	function get_batu(){
		if (isset($_GET['term'])){
			$q = strtolower($_GET['term']);
			$this->appmodel->get_autocomplete($q,'tipe_batu','tipe_batu','tipe_batu','id_tipebatu');
		  }
	}

	
	function refbatu($id = null){
		if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){

			if($this->session->userdata('level')== 1){
				//halaman referensi jenis batu
				if(!isset($id)){
					//halaman table referensi batu
					$data['isi'] = $this->appmodel->gettable('tipe_batu');
					$this->load->view('backend/header/header');
					$this->load->view('backend/refbatu/list',$data);
					$this->load->view('backend/footer/footer');


				}elseif($id === 'tambah'){
					//echo "halaman tambah batu";
					$this->load->view('backend/header/header');
					$this->load->view('backend/refbatu/tambah');
					$this->load->view('backend/footer/footer');
				}else{
					//jika bukan admin, lempar ke halaman beranda
					redirect('app','refresh');	
				}
			}else{
					redirect('auth/login','refresh');
			}

		}
	}
}