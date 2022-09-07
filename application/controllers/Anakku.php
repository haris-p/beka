<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anakku extends CI_Controller {
	private $parents = "Anak Saya";
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
		
		$user = $this->session->userdata('sess_user');
		$anak = $this->db->get_where('siswa',array('id_wali_siswa' => $user ))->result();


		$data['title'] = $this->parents.' | '.get_apl('nama_sistem');
		$data['cumb_up'] = $this->parents;
		
		$this->breadcrumb->append_crumb(get_apl('nama_sistem'), $this->mza_secureurl->setSecureUrl_encode('Dashboard','index'));
		$this->breadcrumb->append_crumb($this->parents, $this->mza_secureurl->setSecureUrl_encode('siswa','index'));

		$data['menu1']='siswa';
		$data['siswa'] = $anak;
		$data['menu2']='';
		$data['content'] = 'anak/list-anakku.php';
		$this->load->view('admin/template',$data);
	}
	public function refreshsearch(){
		$this->session->unset_userdata('idkelas_dimenu_siswa');
		$this->session->set_flashdata('success','Pencarian berhasil direset!');
		redirect(site_url($this->mza_secureurl->setSecureUrl_encode('siswa','index')),'refresh');
	}

	public function add(){
		if($this->input->post('nama')){
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
			$this->form_validation->set_rules('jenkel', 'jenkel', 'trim|required');
			$this->form_validation->set_rules('hp', 'hp', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Data gagal di simpan!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('siswa','index')),'refresh');
			} else {
				$data=array(
					"nis_siswa"=>filter_string($this->input->post('nis',TRUE)),
					"nama_siswa"=>filter_string($this->input->post('nama',TRUE)),
					"alamat_siswa"=>filter_string($this->input->post('alamat',TRUE)),
					"hp_siswa"=>filter_string($this->input->post('hp',TRUE)),
					"jenkel_siswa"=>filter_string($this->input->post('jenkel',TRUE)),
					"id_kelas_siswa"=>filter_string($this->input->post('idkelassiswa',TRUE)),
					"pass_siswa"=>paramencrypt($this->input->post('nis',TRUE)),
					"id_akses_siswa"=>"SI",
					"status_siswa"=>1,
				);
				$this->M_main->insert('siswa', $data);

				$datalama = "";
				$databaru = $data['nis_siswa'].'<br>'.$data['nama_siswa'].'<br>'.$data['alamat_siswa'].'<br>'.$data['hp_siswa'].'<br>'.$data['jenkel_siswa'].'<br>'.$data['id_akses_siswa'];
				// history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat)
				history('',$this->parents,'Menambah Data',$datalama,$databaru,'');
				
				$this->session->set_flashdata('success','Berhasil menambahkan data siswa baru!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('siswa','index')),'refresh');
			}
		}
		$data['xyz'] = $this->input->post('id');
		$this->load->view('admin/siswa/add-siswa.php',$data);
	}
	public function delete(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal menghapus data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('siswa','index')),'refresh');
			} else {
				$row=$this->M_main->get_where('siswa','nis_siswa',$this->input->post('id_'))->row_array();
				
				$this->db->where('nis_siswa', $this->input->post('id_'));
				$this->db->delete('siswa');
				
				history('',$this->parents,'Menghapus Data','','',$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Berhasil menghapus data : '.$row['nama_siswa']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('siswa','index')),'refresh');
			}
		}
		$data['row']=$this->M_main->get_where('siswa','nis_siswa',$this->input->post('id'))->row_array();
		$this->load->view('admin/siswa/delete-siswa.php',$data);
	}

	public function update(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
			$this->form_validation->set_rules('jenkel', 'jenkel', 'trim|required');
			$this->form_validation->set_rules('hp', 'hp', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal mengedit data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('siswa','index')),'refresh');
			} else {
				$row= $this->M_main->get_where('siswa','nis_siswa',$this->input->post('id_'))->row_array();
				$update = array(
			       	"nis_siswa"=>filter_string($this->input->post('nis',TRUE)),
					"nama_siswa"=>filter_string($this->input->post('nama',TRUE)),
					"alamat_siswa"=>filter_string($this->input->post('alamat',TRUE)),
					"hp_siswa"=>filter_string($this->input->post('hp',TRUE)),
					"jenkel_siswa"=>filter_string($this->input->post('jenkel',TRUE)),
				);
				$this->db->where('nis_siswa', $this->input->post('id_'));
				$this->db->update('siswa', $update);

				// $id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat
				$datalama = $row['nis_siswa'].'<br>'.$row['nama_siswa'].'<br>'.$row['alamat_siswa'].'<br>'.$row['hp_siswa'].'<br>'.$row['jenkel_siswa'];
				$databaru = $update['nis_siswa'].'<br>'.$update['nama_siswa'].'<br>'.$update['alamat_siswa'].'<br>'.$update['hp_siswa'].'<br>'.$update['jenkel_siswa'];
				history('',$this->parents,'Mengedit Data',$datalama,$databaru,$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Berhasil mengedit data : '.$row['nama_siswa']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('siswa','index')),'refresh');
			}
		}
		$data['row']=$this->M_main->get_where('siswa','nis_siswa',$this->input->post('id'))->row_array();
		$this->load->view('admin/siswa/update-siswa.php',$data);
	}

	// function kode(){
	// 	 echo $this->M_main->getKodeMaster("KLS","id_siswa","siswa");
	// }
}