<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoripelanggaran extends CI_Controller {
	private $parents = "Kategori Pelanggaran";
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
		$this->breadcrumb->append_crumb($this->parents, $this->mza_secureurl->setSecureUrl_encode('kategoripelanggaran','index'));

		$data['Kategori'] = $this->M_main->get_where('kategori_pelanggaran','status_kategori_pelanggaran',1)->result();

		$data['menu1']='masterdata';
		$data['menu2']='kategoripelanggaran';
		$data['content'] = 'kategoripelanggaran/list-kategori.php';
		$this->load->view('admin/template',$data);
	}
	
	public function add(){
		if($this->input->post('nama')){
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Data gagal di simpan!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kategoripelanggaran','index')),'refresh');
			} else {
				$data=array(
					"nama_kategori_kategori_pelanggaran"=>filter_string($this->input->post('nama',TRUE)),
					"status_kategori_pelanggaran"=>1,
				);
				$this->M_main->insert('kategori_pelanggaran', $data);

				$datalama = "";
				$databaru = $data['nama_kategori_kategori_pelanggaran'];
				// history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat)
				history('',$this->parents,'Menambah Data',$datalama,$databaru,'');
				
				$this->session->set_flashdata('success','Berhasil menambahkan kategori baru!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kategoripelanggaran','index')),'refresh');
			}
		}
		$this->load->view('admin/kategoripelanggaran/add-kategori.php');
	}
	public function delete(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal menghapus data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kategoripelanggaran','index')),'refresh');
			} else {
				$row=$this->M_main->get_where('kategori_pelanggaran','id_kategori_pelanggaran',$this->input->post('id_'))->row_array();
				
				$this->db->where('id_kategori_pelanggaran', $this->input->post('id_'));
				$this->db->delete('kategori_pelanggaran');
				
				history('',$this->parents,'Menghapus Data','','',$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Berhasil menghapus data : '.$row['nama_kategori_kategori_pelanggaran']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kategoripelanggaran','index')),'refresh');
			}
		}
		$data['row']=$this->M_main->get_where('kategori_pelanggaran','id_kategori_pelanggaran',$this->input->post('id'))->row_array();
		$this->load->view('admin/kategoripelanggaran/delete-kategori.php',$data);
	}

	public function update(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal mengedit data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kategoripelanggaran','index')),'refresh');
			} else {
				$row=$this->M_main->get_where('kategori_pelanggaran','id_kategori_pelanggaran',$this->input->post('id_'))->row_array();

				$update = array(
			        "nama_kategori_kategori_pelanggaran"=>filter_string($this->input->post('nama',TRUE)),
				);
				$this->db->where('id_kategori_pelanggaran', $this->input->post('id_'));
				$this->db->update('kategori_pelanggaran', $update);

				// $id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat

				history('',$this->parents,'Mengedit Data',$row['nama_kategori_kategori_pelanggaran'],$update['nama_kategori_kategori_pelanggaran'],$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Berhasil mengedit data : '.$row['nama_kategori_kategori_pelanggaran']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('kategoripelanggaran','index')),'refresh');
			}
		}
		$data['row']=$this->M_main->get_where('kategori_pelanggaran','id_kategori_pelanggaran',$this->input->post('id'))->row_array();
		$this->load->view('admin/kategoripelanggaran/update-kategori.php',$data);
	}
}