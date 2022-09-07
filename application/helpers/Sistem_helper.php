<?php 
	function get_apl($record){
		$ci =& get_instance();
		$q = $ci->db->get_where('config', array(
			'id' => 'BK1',
		))->row_array();
		return $q[$record];
	}
	function kelamin($jenkel){
		if ($jenkel=='L') {
            echo "Laki - Laki";
        }elseif ($jenkel=='P') {
            echo "Perempuan";
        }else{
            echo "-";
        }
	}

	// function get_user($id,$record){
	// 	$ci =& get_instance();
	// 	$q = $ci->db->get_where('person_rs', array(
	// 		'dokter' => $id,
	// 	))->row_array();
	// 	return $q[$record];
	// }

	// function get_hak_akses($id,$record){
	// 	$ci =& get_instance();
	// 	$q = $ci->db->get_where('software_rs', array(
	// 		'rekam_medis' => $id,
	// 	))->row_array();
	// 	return $q[$record];
	// }

	function get_breadcrumb(){
		$ci=& get_instance();
		$config['divider'] = '<span class="divider" style="color:white"> » </span>';
		return $ci->breadcrumb->initialize($config);
	}

	function alert(){
		$ci =& get_instance();
		$success=$ci->session->flashdata('success');
		$error=$ci->session->flashdata('error');
		if($success!=""){
			$return='<script>
						window.onload= function(){
							swal("Sukses !", "'.$success.'", "success");
					 	};
					 </script>
					';
		}elseif($error!=""){
			$return='<script>
						window.onload= function(){
							swal("Error !", "'.$error.'", "error");
						};
					 </script>
					';
		}else{
			$return="";
		}
		return $return;
	}

	function history($id_dikenai,$menu,$kegiatan,$datalama,$databaru,$idriwayat){
	date_default_timezone_set("Asia/Jakarta");
	$ci=& get_instance();
	$data=array(
		"waktu_log"=>date('Y-m-d H:i:s'),
		"pelaku_log"=>$ci->session->userdata('sess_user'),//session
		"dikenai_log"=>$id_dikenai,
		"menu_log"=>get_apl('ns_config').' &raquo; '.$menu,
		"kegiatan_log"=>$kegiatan,
		"data_lama_log"=>$datalama,
		"data_baru_log"=>$databaru,
		"riwayat_log"=>$idriwayat,
	);
	$ci->db->insert('log', $data);
}
function filter_string($data){
	return htmlspecialchars(htmlentities(trim($data)));
}

	// function must_login(){
	// 	$ci =& get_instance();
	// 	if(count($ci->session->userdata('sess_user'))==0){
	// 		$ci->session->set_flashdata('error','Anda Harus Log in dulu!');
	// 		redirect('auth');
	// 	}
	// }
	// function is_login(){
	// 	$ci =& get_instance();
	// 	if(count($ci->session->userdata('sess_user'))==1){
	// 		redirect('jkasdfiusmdhf3b324nd4ejfdskfdkfh'); 
	// }


	// function equal_text($text,$equal,$return){
	// if($text==$equal){
	// 	return $return;
	// }else{
	// 	return "";
	// }
	// }
// }

?>