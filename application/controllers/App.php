<?php

class App extends CI_CONTROLLER{
	
	
	
	
	function __construct(){
		parent::__construct();
		//config site
		
			
			
		
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
						'tipe_batu' => $this->input->post('tipe_batu'),
						'soft_delete' => 0
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
			if($this->session->userdata('level') == 1){
				//form tambah batu
				$this->load->view('backend/header/header');
				$this->load->view('backend/batu/tambahbatu');
				$this->load->view('backend/footer/footer');
			}
		}else{
			redirect('auth/login','refresh');
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
	//fungsi hapus batu
	//data tidak benar-benar dihapus krn menggunakan metode softdel
	function hapusrefbatu($id = null){
		if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){
			if($this->session->userdata('level')== 1){
				if(isset($id)){
					$this->db->where(array('id_tipebatu' => $id));
					$a = $this->db->get('tipe_batu');
					if($a->num_rows() > 0 ){
						$this->db->where(array('id_tipebatu'=>$id));
						$b = $this->db->update('tipe_batu',array('soft_delete'=>1));
						if($b){
							$pesan = array(
								'status' => 'success',
								'pesan'	 => 'Data sudah dihapus'
							);	
						}
					}else{
						$pesan = array(
							'status' => 'failed',
							'pesan'	 => 'Data tidak ditemukan'
						);
					}
					echo json_encode($pesan);
				}
			}
		}
	}
	function hapusbatu($id = null){
		if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){
			if($this->session->userdata('level')== 1){
				if(isset($id)){
					$this->db->where(array('id_batu' => $id));
					$a = $this->db->get('batu');
					if($a->num_rows() > 0 ){
						$this->db->where(array('id_batu'=>$id));
						$b = $this->db->update('batu',array('soft_delete'=>'1'));
						if($b){
							$pesan = array(
								'status' => 'success',
								'pesan'	 => 'Data sudah dihapus'
							);	
						}
					}else{
						$pesan = array(
							'status' => 'failed',
							'pesan'	 => 'Data tidak ditemukan'
						);
					}
					echo json_encode($pesan);
				}
			}
		}
	}
	function batu(){
		if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){
			if($this->session->userdata('level')== 1){
				$this->db->where(array('batu.soft_delete'=>'0','tipe_batu.soft_delete'=>0));
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
					'tgl_input'		=> date('Y-m-d'),
					'soft_delete'	=> '0'
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
			//$this->db->where(array('soft_delete'=>0));
			$q = strtolower($_GET['term']);
			$this->appmodel->get_autocomplete($q,'tipe_batu','tipe_batu','tipe_batu','id_tipebatu',array('soft_delete'=>0));
		  }
	}

	
	function refbatu($id = null){
		if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){

			if($this->session->userdata('level')== 1){
				//halaman referensi jenis batu
				if(!isset($id)){
					//halaman table referensi batu
					$this->db->where(array('soft_delete'=> 0));
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
			
		}else{
			redirect('auth/login','refresh');
		}
	}
	
	function rwytbatu($id = null){
		if($this->session->userdata('username',TRUE) && $this->session->userdata('level',TRUE)){

			if($this->session->userdata('level')== 1){
				//=================
				if(isset($id)){
					//detil batu
					
					$this->db->where(array('id_batu'=>$id));
					$this->db->join('tipe_batu','tipe_batu.id_tipebatu=batu.id_tipebatu','inner');
					$data['dtl'] = $this->db->get('batu')->row();

					//list riwayat penggunaan
					$this->db->where(array('batu.id_batu'=>$id));
					//$this->db->join('tipe_batu','tipe_batu.id_tipebatu=batu.id_tipebatu','inner');
					$this->db->join('penggunaan_batu','batu.id_batu=penggunaan_batu.id_batu','left');
					$this->db->join('mesin','mesin.id_mesin = penggunaan_batu.id_mesin','inner');
					$data['rwyt'] = $this->appmodel->gettable('batu');
					// total waktu penggunaan
					$this->db->where(array('id_batu'=>$id));
					$this->db->select('SUM(waktu_penggunaan) as total_waktu');
					//$this->db->from('penggunaan_batu');
					
					$data['jumlah'] = $this->db->get('penggunaan_batu')->row();
					//load view
					$this->load->view('backend/header/header',$data);
					$this->load->view('backend/batu/riwayat',$data);
					$this->load->view('backend/footer/footer');

				}
			}else{
				redirect('auth/login','refresh');
			}
		}else{
			redirect('auth/login','refresh');
		}
	}

	function formriwayat(){
		$this->load->view('backend/batu/form/tambahriwayat');
	}
}