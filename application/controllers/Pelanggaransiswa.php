<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaransiswa extends CI_Controller {
	private $parents = "Pelanggaran Siswa";
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
		$this->breadcrumb->append_crumb($this->parents, $this->mza_secureurl->setSecureUrl_encode('siswa','index'));

		$data['menu1']='pelanggaransiswa';
		$data['menu2']='';
		$data['content'] = 'pelanggaransiswa/search.php';
		$this->load->view('admin/template',$data);
	}

	public function search(){
		$awal = microtime(true);
		$this->form_validation->set_rules('search', 'search', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error','Query anda salah!');
			redirect(site_url($this->mza_secureurl->setSecureUrl_encode('pelanggaransiswa','index')),'refresh');
		} else {
			$key = $this->input->post('search');
			$set = array(
				'key_search' => $key
			);
			
			$this->session->set_userdata( $set );

			$data['title'] = $this->parents.' | '.get_apl('nama_sistem');
			$data['cumb_up'] = $this->parents;
			
			$this->breadcrumb->append_crumb(get_apl('nama_sistem'), $this->mza_secureurl->setSecureUrl_encode('Dashboard','index'));
			$this->breadcrumb->append_crumb($this->parents, $this->mza_secureurl->setSecureUrl_encode('siswa','index'));

			$data['menu1']='pelanggaransiswa';
			$data['menu2']='';
			$data['content'] = 'pelanggaransiswa/hasil_search.php';

			$akhir = microtime(true);
			$lama = $akhir - $awal;
			$data['waktu_search'] = round($lama, 2);

			$this->load->view('admin/template',$data);
		}
	}
	public function detail_siswa($id){
		$data['title'] = $this->parents.' | '.get_apl('nama_sistem');
		$data['cumb_up'] = $this->parents;
		$siswa = $this->M_main->get_where('siswa','nis_siswa',$id)->row_array();
		$data['siswa'] = $siswa;

		$this->breadcrumb->append_crumb(get_apl('nama_sistem'), $this->mza_secureurl->setSecureUrl_encode('Dashboard','index'));
		$this->breadcrumb->append_crumb($this->parents, site_url($this->mza_secureurl->setSecureUrl_encode('pelanggaransiswa','index')));
		$this->breadcrumb->append_crumb($siswa['nama_siswa'], $this->mza_secureurl->setSecureUrl_encode('siswa','index'));

		$data['menu1']='pelanggaransiswa';
		$data['menu2']='';
		$data['content'] = 'pelanggaransiswa/detail_siswa.php';
		$this->load->view('admin/template',$data);
	}
	public function addpelanggaran($id){
		$data['title'] = $this->parents.' | '.get_apl('nama_sistem');
		$data['cumb_up'] = $this->parents;
		$siswa = $this->M_main->get_where('siswa','nis_siswa',$id)->row_array();
		$data['siswa'] = $siswa;
		$data['kategori'] = $this->M_main->get_where('kategori_pelanggaran','status_kategori_pelanggaran',1)->result();

		$this->breadcrumb->append_crumb(get_apl('nama_sistem'), $this->mza_secureurl->setSecureUrl_encode('Dashboard','index'));
		$this->breadcrumb->append_crumb($this->parents, $this->mza_secureurl->setSecureUrl_encode('siswa','index'));
		$this->breadcrumb->append_crumb($siswa['nama_siswa'], site_url($this->mza_secureurl->setSecureUrl_encode('Pelanggaransiswa','detail_siswa',array($id))));
		$this->breadcrumb->append_crumb('Tambah Pelanggaran', $this->mza_secureurl->setSecureUrl_encode('siswa','index'));

		$data['menu1']='pelanggaransiswa';
		$data['menu2']='';
		$data['content'] = 'pelanggaransiswa/add_pelanggaran.php';
		$this->load->view('admin/template',$data);
	}
	public function loadpelanggaran($idkategori){
		$q = $this->M_main->get_where('pelanggaran','id_kategori_pelanggaran',$idkategori)->result();
		$data = "<option value=''>- Nama Pelanggaran -</option>";
        foreach ($q as $value) {
            $data .= "<option value='".$value->id_pelanggaran."'>".$value->nama_pelanggaran." Point ".$value->point_pelanggaran."</option>";
        }
        echo $data;
	}
	public function prosesadd(){
		$this->form_validation->set_rules('nis_tenan', 'nis_tenan', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('idkategoripelanggaran', 'idkategoripelanggaran', 'trim|required');
		$this->form_validation->set_rules('pointpelanggaran', 'pointpelanggaran', 'trim|required');
		$this->form_validation->set_rules('tglkejadian', 'tglkejadian', 'trim|required');
		$this->form_validation->set_rules('tempatkejadian', 'tempatkejadian', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error','Data gagal di simpan!');
			redirect(site_url($this->mza_secureurl->setSecureUrl_encode('Pelanggaransiswa','index')),'refresh');
		} else {
			date_default_timezone_set('Asia/Jakarta');
			$nis = $this->input->post('nis_tenan');
			$nama = $this->input->post('nama');
			$idkategori = $this->input->post('idkategoripelanggaran');
			$pointpelanggaran = $this->input->post('pointpelanggaran');
			$tglkejadian = $this->input->post('tglkejadian');
			$keterangan = $this->input->post('keterangan');
			$tempat = $this->input->post('tempatkejadian');
			$tgl = $this->input->post('tglkejadian');

			$waktu = date('YmdHis');
			// echo $nis.$idkategori.$waktu;
			$data = array(
						'id_pelanggaran_siswa' => $nis.$idkategori.$waktu,
						'nis_pelanggaran_siswa' => $nis,
						'id_pelanggaran_pelanggaran_siswa' => $idkategori,
						'point_pelanggaran' => $pointpelanggaran,
						'id_guru_pelanggaran_siswa' => $this->session->userdata('sess_user'),
						'waktu_melanggar_pelanggaran_siswa' => $tgl,
						'waktu_input_pelanggaran_siswa' => $waktu,
						'tempat_pelanggaran_siswa' => $tempat,
						'keterangan_pelanggaran_siswa' => $keterangan,
						'status_pelanggaran_siswa' => '1',
			);
			$this->M_main->insert('pelanggaran_siswa', $data);
			$datalama = "";
			$databaru = $data['id_pelanggaran_siswa'].'<br>'.$data['nis_pelanggaran_siswa'].'<br>'.$data['id_pelanggaran_pelanggaran_siswa'].'<br>'.$data['point_pelanggaran'].'<br>'.$data['id_guru_pelanggaran_siswa'].'<br>'.$data['waktu_melanggar_pelanggaran_siswa'].'<br>'.$data['waktu_input_pelanggaran_siswa'].'<br>'.$data['tempat_pelanggaran_siswa'].'<br>'.$data['keterangan_pelanggaran_siswa'];
			// history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat)
			history('',$this->parents,'Menambah Pelanggaran',$datalama,$databaru,'');
			$this->session->set_flashdata('success','Berhasil menambah pelanggaran');
			redirect(site_url($this->mza_secureurl->setSecureUrl_encode('pelanggaransiswa','detail_siswa',array($nis))),'refresh');	
		}
	}
	public function detailpelanggaran(){
		$id = $this->input->post('id');
		$siswa = $this->M_main->get_where('siswa','nis_siswa',$id)->row_array();
		$data['siswa'] = $siswa;
		$data['datapelanggaransiswa'] = $this->M_main->get_where('pelanggaran_siswa','nis_pelanggaran_siswa',$id)->result(); 
		$this->load->view('admin/pelanggaransiswa/detail-pelanggaran-siswa.php',$data);
	}
	//------------------------------------------------------------
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