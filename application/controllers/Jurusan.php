<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
	private $parents = "Jurusan";
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
		$this->breadcrumb->append_crumb($this->parents, $this->mza_secureurl->setSecureUrl_encode('jurusan','index'));

		$data['jurusan'] = $this->M_main->get_where('jurusan','status_jurusan',1)->result();

		$data['menu1']='masterdata';
		$data['menu2']='jurusan';
		$data['content'] = 'jurusan/list-jurusan.php';
		$this->load->view('admin/template',$data);
	}

	public function add(){
		if($this->input->post('nama')){
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Data gagal di simpan!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('jurusan','index')),'refresh');
			} else {
				$id = $this->M_main->getKodeMaster("JUR","id_jurusan","jurusan");
				$data=array(
					"id_jurusan" => $id,
					"nama_jurusan"=>filter_string($this->input->post('nama',TRUE)),
					"akronim_jurusan"=>filter_string($this->input->post('akronim',TRUE)),
					"status_jurusan"=>1,
				);
				$this->M_main->insert('jurusan', $data);

				$datalama = "";
				$databaru = $data['id_jurusan'].'<br>'.$data['nama_jurusan'];
				// history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat)
				history('',$this->parents,'Menambah Data',$datalama,$databaru,'');
				
				$this->session->set_flashdata('success','Berhasil menambahkan jurusan baru!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('jurusan','index')),'refresh');
			}
		}
		$this->load->view('admin/jurusan/add-jurusan.php');
	}
	public function delete(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal menghapus data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('jurusan','index')),'refresh');
			} else {
				$row=$this->M_main->get_where('jurusan','id_jurusan',$this->input->post('id_'))->row_array();
				
				$this->db->where('id_jurusan', $this->input->post('id_'));
				$this->db->delete('jurusan');
				
				history('',$this->parents,'Menghapus Data','','',$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Berhasil menghapus data : '.$row['nama_jurusan']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('jurusan','index')),'refresh');
			}
		}
		$data['row']=$this->M_main->get_where('jurusan','id_jurusan',$this->input->post('id'))->row_array();
		$this->load->view('admin/jurusan/delete-jurusan.php',$data);
	}

	public function update(){
		if($this->input->post('id_')){
			$this->form_validation->set_rules('id_', 'id_', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error','Gagal mengedit data ini!');
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('jurusan','index')),'refresh');
			} else {
				$row= $this->M_main->get_where('jurusan','id_jurusan',$this->input->post('id_'))->row_array();
				$update = array(
			        "akronim_jurusan"=>filter_string($this->input->post('akronim',TRUE)),
			        "nama_jurusan"=>filter_string($this->input->post('nama',TRUE)),
				);
				$this->db->where('id_jurusan', $this->input->post('id_'));
				$this->db->update('jurusan', $update);

				// $id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat
				$datalama = $row['nama_jurusan'].'<br>'.$row['akronim_jurusan'];
				$databaru = $update['nama_jurusan'].'<br>'.$update['akronim_jurusan'];
				history('',$this->parents,'Mengedit Data',$datalama,$databaru,$this->input->post('id_'));
				
				$this->session->set_flashdata('success','Berhasil mengedit data : '.$row['nama_jurusan']);
				redirect(site_url($this->mza_secureurl->setSecureUrl_encode('jurusan','index')),'refresh');
			}
		}
		$data['row']=$this->M_main->get_where('jurusan','id_jurusan',$this->input->post('id'))->row_array();
		$this->load->view('admin/jurusan/update-jurusan.php',$data);
	}

	// function kode(){
	// 	 echo $this->M_main->getKodeMaster("KLS","jurusan","jurusan");
	// }
}