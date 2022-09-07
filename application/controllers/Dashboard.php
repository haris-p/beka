<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	private $parents = "Dashboard";
	function __construct(){
		parent::__construct();
		get_breadcrumb();
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
		$data['title'] = $this->parents.' | '.get_apl('nama_sistem');
		$data['cumb_up'] = $this->parents;
		
		$this->breadcrumb->append_crumb(get_apl('nama_sistem'), $this->mza_secureurl->setSecureUrl_encode('Dashboard','index'));
		$this->breadcrumb->append_crumb($this->parents, $this->mza_secureurl->setSecureUrl_encode('Dashboard','index'));
		
		$data['menu1']='dashboard';
		$data['menu2']='';
		$data['content'] = 'dashboard/index.php';
		$this->load->view('admin/template',$data);
	}
}
