<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model{
	function admin($u,$p){
		$p = paramencrypt($p);
		return $query = $this->db
						->where('id_admin',$u)
						->where('password_admin',$p)
				 		->where('id_akses_admin','AD')
				 		->where('status_admin','1')
				 		->get('admin');
	}

	function guru($u,$p){
		$p = paramencrypt($p);
		return $query = $this->db
						->where('id_guru',$u)
						->where('pass_guru',$p)
				 		->where('id_akses_guru','GR')
				 		->where('status_guru','1')
				 		->get('guru');
	}
	function ortu($u,$p){
		$p = paramencrypt($p);
		return $query = $this->db
						->where('id_ortu',$u)
						->where('pass_ortu',$p)
				 		->where('id_akses_ortu','OT')
				 		->where('status_ortu','1')
				 		->get('ortu');
	}
	function siswa($u,$p){
		$p = paramencrypt($p);
		return $query = $this->db
						->where('nis_siswa',$u)
						->where('pass_siswa',$p)
				 		->where('id_akses_siswa','SI')
				 		->where('status_siswa','1')
				 		->get('siswa');
	}
}
