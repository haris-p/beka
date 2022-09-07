<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	private $parents = "Kelas";
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
		$this->breadcrumb->append_crumb($this->parents, $this->mza_secureurl->setSecureUrl_encode('kelas','index'));

		$data['kelas'] = $this->M_main->get_where('kelas','status_kelas',1)->result();

		$data['menu1']='masterdata';
		$data['menu2']='kelas';
		$data['content'] = 'kelas/list-kelas.php';
		$this->load->view('admin/template',$data);
	}

	public function add(){
		if($this->input->post('nama')){
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Data gagal di simpan!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelas','index')),'refresh');
			} else {
				$id = $this->M_main->getKodeMaster("KLS","id_kelas","kelas");
				$data=array(
					"id_kelas" => $id,
					"nama_kelas"=>filter_string($this->input->post('nama',TRUE)),
					"tingkatan_kelas"=>filter_string($this->input->post('tingkatan',TRUE)),
					"status_kelas"=>1,
				);
				$this->M_main->insert('kelas', $data);

				$datalama = "";
				$databaru = $data['nama_kelas'].'<br>'.$data['tingkatan_kelas'];
				// history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat)
				history('',$this->parents,'Menambah Data',$datalama,$databaru,'');
				
				$this->session->set_flashdata('success','Berhasil menambahkan kelas baru!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelas','index')),'refresh');
			}
		}
		$this->load->view('admin/kelas/add-kelas.php');
	}
	public function delete(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal menghapus data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelas','index')),'refresh');
			} else {
				$row=$this->M_main->get_where('kelas','id_kelas',$this->input->post('id_'))->row_array();
				
				$this->db->where('id_kelas', $this->input->post('id_'));
				$this->db->delete('kelas');
				
				history('',$this->parents,'Menghapus Data','','',$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Berhasil menghapus data : '.$row['nama_kelas']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelas','index')),'refresh');
			}
		}
		$data['row']=$this->M_main->get_where('kelas','id_kelas',$this->input->post('id'))->row_array();
		$this->load->view('admin/kelas/delete-kelas.php',$data);
	}

	public function update(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal mengedit data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelas','index')),'refresh');
			} else {
				$row= $this->M_main->get_where('kelas','id_kelas',$this->input->post('id_'))->row_array();
				$update = array(
			        "tingkatan_kelas"=>filter_string($this->input->post('tingkatan',TRUE)),
			        "nama_kelas"=>filter_string($this->input->post('nama',TRUE)),
				);
				$this->db->where('id_kelas', $this->input->post('id_'));
				$this->db->update('kelas', $update);

				// $id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat
				$datalama = $row['nama_kelas'].'<br>'.$row['tingkatan_kelas'];
				$databaru = $update['nama_kelas'].'<br>'.$update['tingkatan_kelas'];
				history('',$this->parents,'Mengedit Data',$datalama,$databaru,$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Berhasil mengedit data : '.$row['nama_kelas']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kelas','index')),'refresh');
			}
		}
		$data['row']=$this->M_main->get_where('kelas','id_kelas',$this->input->post('id'))->row_array();
		$this->load->view('admin/kelas/update-kelas.php',$data);
	}

	// function kode(){
	// 	 echo $this->M_main->getKodeMaster("KLS","id_kelas","kelas");
	// }
}