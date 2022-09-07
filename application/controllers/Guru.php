<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	private $parents = "Guru";
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
		$this->breadcrumb->append_crumb($this->parents, $this->mza_secureurl->setSecureUrl_encode('guru','index'));

		$data['guru'] = $this->M_main->get_where('guru','status_guru',1)->result();

		$data['menu1']='masterdata';
		$data['menu2']='guru';
		$data['content'] = 'guru/list-guru.php';
		$this->load->view('admin/template',$data);
	}

	public function add(){
		if($this->input->post('nama')){
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('nik', 'nik', 'trim|required');
			$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
			$this->form_validation->set_rules('jenkel', 'jenkel', 'trim|required');
			$this->form_validation->set_rules('hp', 'hp', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Data gagal di simpan!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('guru','index')),'refresh');
			} else {
				$id = $this->M_main->getKodeMaster("GR","id_guru","guru");
				$data=array(
					"id_guru"=>filter_string($this->input->post('idguru',TRUE)),
					"nik"=>filter_string($this->input->post('nik',TRUE)),
					"nama_guru"=>filter_string($this->input->post('nama',TRUE)),
					"alamat_guru"=>filter_string($this->input->post('alamat',TRUE)),
					"hp_guru"=>filter_string($this->input->post('hp',TRUE)),
					"jenkel_guru"=>filter_string($this->input->post('jenkel',TRUE)),
					"pass_guru"=>paramencrypt($this->input->post('idguru',TRUE)),
					"id_akses_guru"=>"GR",
					"status_guru"=>1,
				);
				$this->M_main->insert('guru', $data);

				$datalama = "";
				$databaru = $data['id_guru'].'<br>'.$data['nik'].'<br>'.$data['nama_guru'].'<br>'.$data['alamat_guru'].'<br>'.$data['hp_guru'].'<br>'.$data['jenkel_guru'].'<br>'.$data['id_akses_guru'];
				// history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat)
				history('',$this->parents,'Menambah Data',$datalama,$databaru,'');
				
				$this->session->set_flashdata('success','Berhasil menambahkan data guru baru!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('guru','index')),'refresh');
			}
		}
		$this->load->view('admin/guru/add-guru.php');
	}
	public function delete(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal menghapus data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('guru','index')),'refresh');
			} else {
				$row=$this->M_main->get_where('guru','id_guru',$this->input->post('id_'))->row_array();
				
				$this->db->where('id_guru', $this->input->post('id_'));
				$this->db->delete('guru');
				
				history('',$this->parents,'Menghapus Data','','',$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Berhasil menghapus data : '.$row['nama_guru']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('guru','index')),'refresh');
			}
		}
		$data['row']=$this->M_main->get_where('guru','id_guru',$this->input->post('id'))->row_array();
		$this->load->view('admin/guru/delete-guru.php',$data);
	}

	public function update(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			$this->form_validation->set_rules('nik', 'nik', 'trim|required');
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
			$this->form_validation->set_rules('jenkel', 'jenkel', 'trim|required');
			$this->form_validation->set_rules('hp', 'hp', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal mengedit data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('guru','index')),'refresh');
			} else {
				$row= $this->M_main->get_where('guru','id_guru',$this->input->post('id_'))->row_array();
				$update = array(
					"id_guru"=>filter_string($this->input->post('idguru',TRUE)),
					"nik"=>filter_string($this->input->post('nik',TRUE)),
					"nama_guru"=>filter_string($this->input->post('nama',TRUE)),
					"alamat_guru"=>filter_string($this->input->post('alamat',TRUE)),
					"hp_guru"=>filter_string($this->input->post('hp',TRUE)),
					"jenkel_guru"=>filter_string($this->input->post('jenkel',TRUE)),
				);
				$this->db->where('id_guru', $this->input->post('id_'));
				$this->db->update('guru', $update);

				// $id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat
				$datalama = $row['id_guru'].'<br>'.$row['nik'].'<br>'.$row['nama_guru'].'<br>'.$row['alamat_guru'].'<br>'.$row['hp_guru'].'<br>'.$row['jenkel_guru'];
				$databaru = $update['id_guru'].'<br>'.$update['nik'].'<br>'.$update['nama_guru'].'<br>'.$update['alamat_guru'].'<br>'.$update['hp_guru'].'<br>'.$update['jenkel_guru'];
				history('',$this->parents,'Mengedit Data',$datalama,$databaru,$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Berhasil mengedit data : '.$row['nama_guru']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('guru','index')),'refresh');
			}
		}
		$data['row']=$this->M_main->get_where('guru','id_guru',$this->input->post('id'))->row_array();
		$this->load->view('admin/guru/update-guru.php',$data);
	}

	// function kode(){
	// 	 echo $this->M_main->getKodeMaster("KLS","id_guru","guru");
	// }
}