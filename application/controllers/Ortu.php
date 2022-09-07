<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ortu extends CI_Controller {
	private $parents = "Orangtua";
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
	public function index()
	{
		// redirect(site_url($this->mza_secureurl->setSecureUrl_encode('Dashboard','index')),'refresh');

		$data['title'] = $this->parents.' | '.get_apl('nama_sistem');
		$data['cumb_up'] = $this->parents;
		
		$this->breadcrumb->append_crumb(get_apl('nama_sistem'), $this->mza_secureurl->setSecureUrl_encode('Dashboard','index'));
		$this->breadcrumb->append_crumb($this->parents, $this->mza_secureurl->setSecureUrl_encode('ortu','index'));

		$data['ortu'] = $this->M_main->get_where('ortu','status_ortu',1)->result();

		$data['menu1']='masterdata';
		$data['menu2']='ortu';
		$data['content'] = 'ortu/list-ortu.php';
		$this->load->view('admin/template',$data);
	}

	public function add(){
		if($this->input->post('nama')){
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
			$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
			$this->form_validation->set_rules('hp', 'hp', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Data gagal di simpan!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('ortu','index')),'refresh');
			} else {
				$id = $this->M_main->getKodeMaster("ort","id_ortu","ortu");
				$data=array(
					"id_ortu"=>filter_string($this->input->post('idortu',TRUE)),
					"nama_ortu"=>filter_string($this->input->post('nama',TRUE)),
					"alamat_ortu"=>filter_string($this->input->post('alamat',TRUE)),
					"hp_ortu"=>filter_string($this->input->post('hp',TRUE)),
					"pekerjaan_ortu"=>filter_string($this->input->post('pekerjaan',TRUE)),
					"pass_ortu"=>paramencrypt($this->input->post('idortu',TRUE)),
					"id_akses_ortu"=>"OT",
					"status_ortu"=>1,
				);
				$this->M_main->insert('ortu', $data);

				$datalama = "";
				$databaru = $data['id_ortu'].$data['nama_ortu'].'<br>'.$data['alamat_ortu'].'<br>'.$data['hp_ortu'].'<br>'.$data['pekerjaan_ortu'].'<br>'.$data['id_akses_ortu'];
				// history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat)
				history('',$this->parents,'Menambah Data',$datalama,$databaru,'');
				
				$this->session->set_flashdata('success','Berhasil menambahkan data Orangtua baru!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('ortu','index')),'refresh');
			}
		}
		$this->load->view('admin/ortu/add-ortu.php');
	}
	public function delete(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal menghapus data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('ortu','index')),'refresh');
			} else {
				$row=$this->M_main->get_where('ortu','id_ortu',$this->input->post('id_'))->row_array();
				
				$this->db->where('id_ortu', $this->input->post('id_'));
				$this->db->delete('ortu');
				
				history('',$this->parents,'Menghapus Data','','',$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Berhasil menghapus data : '.$row['nama_ortu']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('ortu','index')),'refresh');
			}
		}
		$data['row']=$this->M_main->get_where('ortu','id_ortu',$this->input->post('id'))->row_array();
		$this->load->view('admin/ortu/delete-ortu.php',$data);
	}

	public function update(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
			$this->form_validation->set_rules('hp', 'hp', 'trim|required');
			$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal mengedit data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('ortu','index')),'refresh');
			} else {
				$row= $this->M_main->get_where('ortu','id_ortu',$this->input->post('id_'))->row_array();
				$update = array(
					"id_ortu"=>filter_string($this->input->post('idortu',TRUE)),
					"nama_ortu"=>filter_string($this->input->post('nama',TRUE)),
					"alamat_ortu"=>filter_string($this->input->post('alamat',TRUE)),
					"hp_ortu"=>filter_string($this->input->post('hp',TRUE)),
					"pekerjaan_ortu"=>filter_string($this->input->post('pekerjaan',TRUE)),
				);
				$this->db->where('id_ortu', $this->input->post('id_'));
				$this->db->update('ortu', $update);

				// $id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat
				$datalama = $row['id_ortu'].$row['nama_ortu'].'<br>'.$row['alamat_ortu'].'<br>'.$row['hp_ortu'].$row['pekerjaan_ortu'];
				$databaru = $update['id_ortu'].$update['nama_ortu'].'<br>'.$update['alamat_ortu'].'<br>'.'<br>'.$update['hp_ortu'].$update['pekerjaan_ortu'];
				history('',$this->parents,'Mengedit Data',$datalama,$databaru,$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Berhasil mengedit data : '.$row['nama_ortu']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('ortu','index')),'refresh');
			}
		}
		$data['row']=$this->M_main->get_where('ortu','id_ortu',$this->input->post('id'))->row_array();
		$this->load->view('admin/ortu/update-ortu.php',$data);
	}

	// function kode(){
	// 	 echo $this->M_main->getKodeMaster("KLS","id_gortu","ortu");
	// }
}