<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {
	private $parents = "Login";
	private $con = "C_login";
	function __construct(){
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model('M_login');
	}
	function secure($url){
		$data	= $this->mza_secureurl->setSecureUrl_decode($url);
		if($data != false){
			if (method_exists($this, trim($data['function']))){
				if(!empty($data['params'])){
					return call_user_func_array(array($this, trim($data['function'])), $data['params']);
				}else{
					return $this->$data['function']();
				}
			}
		}
		show_404();
	}
	public function index(){
		$data['title'] = $this->parents.' | '.get_apl('nama_sistem');
		$this->load->view('Login', $data);
	}
	public function cek(){
		// $string = "asusx200ca";
        // echo $encript =  $this->encryption->encrypt('AD001');
  //       echo "<br>";
        // echo $decript = $this->encryption->decrypt($encript); 

		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		if (substr($username,0,2)=="AD") { // echo "Admin";
			$cek = $this->M_login->admin($username,$pass);
			$jml = $cek->num_rows();
			if ($jml==1) { // echo "login";
				$user = $cek->row_array();
				$id_akses = $user['id_akses_admin'];
				$akses = $this->M_main->get_where('hak_akses','id_hak_akses',$id_akses)->row_array();
				$sess = array(
					'sess_user' => $username,
					'sess_akses' => $id_akses
				);
				$this->session->set_userdata( $sess );

				$datalama = "";
				$databaru = "";
				// history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat)
				history('',$this->parents,'Login Sebagai '.$akses['nama_hak_akses'],$datalama,$databaru,'');

				$this->session->set_flashdata('success', 'Selamat Datang! <br>'.$user['nama_admin'].' sebagai '.$akses['nama_hak_akses']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('Dashboard','index')),'refresh');				
			}else{
				$this->session->set_flashdata('error','Username atau Password anda salah!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode($this->con,'index')),'refresh');
			}
		}elseif (substr($username,0,2)=="GR") {  // echo "Guru";
			$cek = $this->M_login->guru($username,$pass);
			$jml = $cek->num_rows();
			if ($jml==1) { // echo "login";
				$user = $cek->row_array();
				$id_akses = $user['id_akses_guru'];
				$akses = $this->M_main->get_where('hak_akses','id_hak_akses',$id_akses)->row_array();
				$sess = array(
					'sess_user' => $username,
					'sess_akses' => $id_akses
				);
				$this->session->set_userdata( $sess );
				$datalama = "";
				$databaru = "";
				// history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat)
				history('',$this->parents,'Login Sebagai '.$akses['nama_hak_akses'],$datalama,$databaru,'');
				$this->session->set_flashdata('success', 'Selamat Datang! <br>'.$user['nama_guru'].' Sebagai '.$akses['nama_hak_akses']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('Dashboard','index')),'refresh');
			}else{
				$this->session->set_flashdata('error','Username atau Password anda salah!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode($this->con,'index')),'refresh');		
			}
		}elseif (substr($username,0,2)=="OT") { // echo "ORTU";
			$cek = $this->M_login->ortu($username,$pass);
			$jml = $cek->num_rows();
			if ($jml==1) { // echo "login";
				$user = $cek->row_array();
				$id_akses = $user['id_akses_ortu'];
				$akses = $this->M_main->get_where('hak_akses','id_hak_akses',$id_akses)->row_array();
				$sess = array(
					'sess_user' => $username,
					'sess_akses' => $id_akses
				);
				$this->session->set_userdata( $sess );
				$datalama = "";
				$databaru = "";
				// history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat)
				history('',$this->parents,'Login Sebagai '.$akses['nama_hak_akses'],$datalama,$databaru,'');
				$this->session->set_flashdata('success', 'Selamat Datang! <br>'.$user['nama_ortu'].' Sebagai '.$akses['nama_hak_akses']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('Dashboard','index')),'refresh');
			}else{
				$this->session->set_flashdata('error','Username atau Password anda salah!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode($this->con,'index')),'refresh');		
			}
		}else{ // echo "SISWA";
			$cek = $this->M_login->siswa($username,$pass);
			$jml = $cek->num_rows();
			if ($jml==1) { 
				// echo "login";
				$user = $cek->row_array();
				$id_akses = $user['id_akses_siswa'];
				$akses = $this->M_main->get_where('hak_akses','id_hak_akses',$id_akses)->row_array();
				$sess = array(
					'sess_user' => $username,
					'sess_akses' => $id_akses,
					'sess_siswa'=>'1',
				);
				$this->session->set_userdata( $sess );
				$datalama = "";
				$databaru = "";
				// history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat)
				history('',$this->parents,'Login Sebagai'.$akses['nama_hak_akses'],$datalama,$databaru,'');
				$this->session->set_flashdata('success', 'Selamat Datang! <br>'.$user['nama_siswa'].' Sebagai '.$akses['nama_hak_akses']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('Dashboard','index')),'refresh');
			}else{
				$this->session->set_flashdata('error','Username atau Password anda salah!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode($this->con,'index')),'refresh');		
			}
		}
	}
	public function logout(){
	    $iduser = $this->session->userdata('sess_user');
    	$idakses = $this->session->userdata('sess_akses');

    	$dataakses = $this->db->get_where('hak_akses',array(
                            'id_hak_akses' => $idakses));
    	$akses = $dataakses->row_array();
    	$namahakakses = $akses['nama_hak_akses'];
		$datalama = "";
		$databaru = "";
		history('','Logout','Logout From '.$namahakakses,$datalama,$databaru,'');
		$this->session->sess_destroy();
		// history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat)
		$this->session->set_flashdata('success','Anda berhasil logout!');
		redirect(site_url($this->mza_secureurl->setSecureUrl_encode($this->con,'index')),'refresh');
	}
	public function pass(){
		echo paramencrypt("9982808499");
	}
}