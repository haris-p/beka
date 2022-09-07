<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelasjurusan extends CI_Controller {
	private $parents = "Kelas Jurusan";
	function __construct(){
		parent::__construct();
		get_breadcrumb();
		$this->load->model('M_main');
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
		$data['cumb_up'] = $this->parents;
		
		$this->breadcrumb->append_crumb(get_apl('nama_sistem'), $this->mza_secureurl->setSecureUrl_encode('Dashboard','index'));
		$this->breadcrumb->append_crumb($this->parents, $this->mza_secureurl->setSecureUrl_encode('kelasjurusan','index'));

		$data['kelas'] = $this->db->query("select * from kelasjurusan
											inner join kelas
											on kelasjurusan.id_kelas_kelasjurusan = kelas.id_kelas
											inner join jurusan
											on kelasjurusan.id_jurusan_kelasjurusan = jurusan.id_jurusan
											where 
											(
											(kelasjurusan.status_kelasjurusan = '1')
											and (kelas.status_kelas = '1')
											and (jurusan.status_jurusan = '1')
											)
											")->result();

		$data['menu1']='masterdata';
		$data['menu2']='kelasjurusan';
		$data['content'] = 'kelasjurusan/list-kelas.php';
		$this->load->view('admin/template',$data);
	}

	public function add(){
		if($this->input->post('nama')){
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('idkelas', 'idkelas', 'trim|required');
			$this->form_validation->set_rules('idjurusan', 'idjurusan', 'trim|required');
			$this->form_validation->set_rules('urutan', 'urutan', 'trim|required');
			$this->form_validation->set_rules('dayatampung', 'dayatampung', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Data gagal di simpan!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelasjurusan','index')),'refresh');
			} else {
				$idkelas = $this->input->post('idkelas');
				$idjurusan = $this->input->post('idjurusan');
				$urutan = $this->input->post('urutan');
				$cek = $this->db->query("select * from kelasjurusan
										where ( 
										(kelasjurusan.id_kelas_kelasjurusan = '$idkelas')
										and (kelasjurusan.id_jurusan_kelasjurusan = '$idjurusan')
										and (kelasjurusan.urutan_kelasjurusan = '$urutan')
										)

					");
				if ($cek->num_rows()==1) {
					$this->session->set_flashdata('error','Kelas Sudah Ada!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelasjurusan','index')),'refresh');
				}else{
				$id = $this->M_main->getKodeMaster("KLJ","id_kelasjurusan","kelasjurusan");
				$data=array(
					"id_kelasjurusan" => $id,
					"id_kelas_kelasjurusan"=>$this->input->post('idkelas',TRUE),
					"id_jurusan_kelasjurusan"=>$this->input->post('idjurusan',TRUE),
					"daya_tampung_kelasjurusan"=>$this->input->post('dayatampung',TRUE),
					"urutan_kelasjurusan"=>$this->input->post('urutan',TRUE),
					"status_kelasjurusan"=>1,
				);
				$this->M_main->insert('kelasjurusan', $data);

				$datalama = "";
				$databaru = $data['id_kelas_kelasjurusan'].'<br>'.$data['id_jurusan_kelasjurusan'].'<br>'.$data['daya_tampung_kelasjurusan'].'<br>'.$data['urutan_kelasjurusan'];
				// history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat)
				history('',$this->parents,'Menambah Data',$datalama,$databaru,'');
				
				$this->session->set_flashdata('success','Berhasil menambahkan kelas baru!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelasjurusan','index')),'refresh');
				}
			}
		}
		$data['jurusan'] = $this->M_main->get_where('jurusan','status_jurusan',1)->result();
		$data['kelas'] = $this->M_main->get_where('kelas','status_kelas',1)->result();
		$this->load->view('admin/kelasjurusan/add-kelasjurusan.php', $data);
	}
	public function detail(){
		$id = $this->input->post('id');
		$data['row'] = $this->db->query("select * from kelasjurusan
										inner join kelas
										on kelasjurusan.id_kelas_kelasjurusan = kelas.id_kelas
										inner join jurusan
										on kelasjurusan.id_jurusan_kelasjurusan = jurusan.id_jurusan
										where 
										(
										(kelasjurusan.status_kelasjurusan = '1')
										and (kelas.status_kelas = '1')
										and (jurusan.status_jurusan = '1')
										and (kelasjurusan.id_kelasjurusan = '$id')
										)
										")->row_array();
		$this->load->view('admin/kelasjurusan/detail-kelas.php',$data);
	}
	public function setwali(){
		$id = $this->input->post('id');
		$data['row'] = $this->db->query("select * from kelasjurusan
										inner join kelas
										on kelasjurusan.id_kelas_kelasjurusan = kelas.id_kelas
										inner join jurusan
										on kelasjurusan.id_jurusan_kelasjurusan = jurusan.id_jurusan
										where 
										(
										(kelasjurusan.status_kelasjurusan = '1')
										and (kelas.status_kelas = '1')
										and (jurusan.status_jurusan = '1')
										and (kelasjurusan.id_kelasjurusan = '$id')
										)
										")->row_array();
		$this->load->view('admin/kelasjurusan/setwali.php',$data);
	}
	public function proses_setwali(){
		$this->form_validation->set_rules('id_', 'id_', 'trim|required');
		$this->form_validation->set_rules('idguru', 'idguru', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error','Harap pilih wali kelas!');
			redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelasjurusan','index')),'refresh');
		} else {
			$wali = array(
				'id_walikelas_kelasjurusan' => $this->input->post('idguru') );
			$this->db->where('id_kelasjurusan', $this->input->post('id_'));
			$this->db->update('kelasjurusan', $wali);
			$datalama='';
			$databaru=$wali['id_walikelas_kelasjurusan'];
			history('',$this->parents,'Set Wali Kelas',$datalama,$databaru,$this->input->post('id_'));
			$this->session->set_flashdata('success','Berhasil menambahkan wali kelas');
			redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelasjurusan','index')),'refresh');
		}
	}
	public function update(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			$this->form_validation->set_rules('idkelas', 'idkelas', 'trim|required');
			$this->form_validation->set_rules('idjurusan', 'idjurusan', 'trim|required');
			$this->form_validation->set_rules('urutan', 'urutan', 'trim|required');
			$this->form_validation->set_rules('dayatampung', 'dayatampung', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal mengedit data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelasjurusan','index')),'refresh');
			} else {
				$idklsjur = $this->input->post('id_');
				$idkelas = $this->input->post('idkelas');
				$idjurusan = $this->input->post('idjurusan');
				$urutan = $this->input->post('urutan');
				$cek = $this->db->query("select * from kelasjurusan
										where ( 
										(kelasjurusan.id_kelas_kelasjurusan = '$idkelas')
										and (kelasjurusan.id_jurusan_kelasjurusan = '$idjurusan')
										and (kelasjurusan.urutan_kelasjurusan = '$urutan')
										and (kelasjurusan.id_kelasjurusan!='$idklsjur')
										)

					");
				if ($cek->num_rows()==1) {
					$this->session->set_flashdata('error','Kelas Sudah Ada!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelasjurusan','index')),'refresh');
				}else{
				$row= $this->db->query("select * from kelasjurusan
										inner join kelas
										on kelasjurusan.id_kelas_kelasjurusan = kelas.id_kelas
										inner join jurusan
										on kelasjurusan.id_jurusan_kelasjurusan = jurusan.id_jurusan
										where 
										(
										(kelasjurusan.status_kelasjurusan = '1')
										and (kelas.status_kelas = '1')
										and (jurusan.status_jurusan = '1')
										and (kelasjurusan.id_kelasjurusan = '$idklsjur')
										)
										")->row_array();
				$update = array(
					"id_kelas_kelasjurusan"=>$this->input->post('idkelas',TRUE),
					"id_jurusan_kelasjurusan"=>$this->input->post('idjurusan',TRUE),
					"daya_tampung_kelasjurusan"=>$this->input->post('dayatampung',TRUE),
					"urutan_kelasjurusan"=>$this->input->post('urutan',TRUE),
				);
				$this->db->where('id_kelasjurusan', $idklsjur);
				$this->db->update('kelasjurusan', $update);

				// $id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat
				$datalama = $row['id_kelas_kelasjurusan'].'<br>'.$row['id_jurusan_kelasjurusan'].'<br>'.$row['daya_tampung_kelasjurusan'].'<br>'.$row['urutan_kelasjurusan'];
				$databaru = $update['id_kelas_kelasjurusan'].'<br>'.$update['id_jurusan_kelasjurusan'].$update['daya_tampung_kelasjurusan'].$update['urutan_kelasjurusan'];
				history('',$this->parents,'Mengedit Data',$datalama,$databaru,$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Berhasil mengedit data : '.$row['tingkatan_kelas'].' '.$row['nama_jurusan'].' '.$row['urutan_kelasjurusan']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelasjurusan','index')),'refresh');
			}
		}
	} //bener

		$id = $this->input->post('id');
		$data['jurusan'] = $this->M_main->get_where('jurusan','status_jurusan',1)->result();
		$data['kelas'] = $this->M_main->get_where('kelas','status_kelas',1)->result();
		$data['row'] = $this->db->query("select * from kelasjurusan
										inner join kelas
										on kelasjurusan.id_kelas_kelasjurusan = kelas.id_kelas
										inner join jurusan
										on kelasjurusan.id_jurusan_kelasjurusan = jurusan.id_jurusan
										where 
										(
										(kelasjurusan.status_kelasjurusan = '1')
										and (kelas.status_kelas = '1')
										and (jurusan.status_jurusan = '1')
										and (kelasjurusan.id_kelasjurusan = '$id')
										)
										")->row_array();
		$this->load->view('admin/kelasjurusan/update-kelasjurusan.php',$data);
	}
	public function delete(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal menghapus data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('jurusan','index')),'refresh');
			} else {
				$row=$this->M_main->get_where('kelasjurusan','id_kelasjurusan',$this->input->post('id_'))->row_array();
				$this->db->where('id_kelasjurusan', $this->input->post('id_'));
				$this->db->delete('kelasjurusan');
				
				history('',$this->parents,'Menghapus Data','','',$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Data berhasil dihapus!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelasjurusan','index')),'refresh');
			}
		}
		$id = $this->input->post('id');
		$data['row'] = $this->db->query("select * from kelasjurusan
										inner join kelas
										on kelasjurusan.id_kelas_kelasjurusan = kelas.id_kelas
										inner join jurusan
										on kelasjurusan.id_jurusan_kelasjurusan = jurusan.id_jurusan
										where 
										(
										(kelasjurusan.status_kelasjurusan = '1')
										and (kelas.status_kelas = '1')
										and (jurusan.status_jurusan = '1')
										and (kelasjurusan.id_kelasjurusan = '$id')
										)
										")->row_array();
		$this->load->view('admin/kelasjurusan/delete-kelasjurusan.php',$data);
	}

	public function remove(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal menghapus data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('jurusan','index')),'refresh');
			} else {

				$wali = array(
					'id_walikelas_kelasjurusan' => '');
				$this->db->where('id_kelasjurusan', $this->input->post('id_'));
				$this->db->update('kelasjurusan', $wali);
				
				history('',$this->parents,'Remove Wali Kelas','ID Wali Kelas : '.$this->input->post("id_wali"),'',$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Wali kelas berhasil diremove!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelasjurusan','index')),'refresh');
			}
		}
		$id = $this->input->post('id');
		$data['row'] = $this->db->query("select * from kelasjurusan
										inner join kelas
										on kelasjurusan.id_kelas_kelasjurusan = kelas.id_kelas
										inner join jurusan
										on kelasjurusan.id_jurusan_kelasjurusan = jurusan.id_jurusan
										where 
										(
										(kelasjurusan.status_kelasjurusan = '1')
										and (kelas.status_kelas = '1')
										and (jurusan.status_jurusan = '1')
										and (kelasjurusan.id_kelasjurusan = '$id')
										)
										")->row_array();
		$this->load->view('admin/kelasjurusan/removewali.php',$data);
	}
	
	// function kode(){
	// 	 echo $this->M_main->getKodeMaster("KLS","id_kelas","kelas");
	// }
}