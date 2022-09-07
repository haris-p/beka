<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_main extends CI_Model{

	/**
	 * [all fungsi mengambil data dari table]
	 * @param  [string] $table [nama tabel]
	 * @return [array]        [data dari tabel]
	 */
	public function all($table)
	{
		return $this->db->get($table);
	}
	/**
	 * [get_where mengambil dengan klausa where]
	 * @param  [string] $table [tabel]
	 * @param  [string] $clm   [nama kolom]
	 * @param  [string] $where [value klausa where]
	 */
	public function get_where($table,$clm,$where)
	{
		$this->db->where($clm, $where);
		return $this->db->get($table);
	}
	public function insert($table,$obj)
	{
		$this->db->insert($table, $obj);
	}
	public function update($table,$data,$clm,$id)
	{
		$this->db->where($clm, $id);
		$this->db->update($table, $data);
	}

	public function getKodeMaster($awal,$clm,$table){
        $q = $this->db->query("SELECT MAX(RIGHT($clm,4)) AS idmax FROM $table");
        $kd = "";
        if($q->num_rows()>0){ //jka ditemukan
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1;
            	$kd = sprintf("%04s", $tmp);
            }
        }
        else{ //jika tidak ditemukan
            $kd = "0001";
        }
        $kar = "$awal";
        $kodemax =  $awal.$kd;
        return $kodemax;
	}

    public function cek_login($nrp,$password){
	    $query = $this->db->query("select*from personil,tiga,angling where
	                              personil.nrp=tiga.andika and
	                              angling.batik=tiga.gading
	                              and personil.nrp='$nrp'
	                              and personil.password='$password'");
	    return $query;
}
}
/* End of file M_main.php */
/* Location: ./application/models/M_main.php */