<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	
	public function __construct() {
 	parent::__construct();
		$this->load->helper(array('form','url')); 
		$this->load->model('Muser');
		$this->load->model('Mcommand');
		
		if ($this->session->userdata('nis')) {
			//if username is already set up, then check the level of username is admin or member
			if($this->session->userdata('level') == 'admin'){
				redirect('user/read');
			}elseif($this->session->userdata('level') == 'siswa'){
				redirect('student/index');
			}
			else{
				redirect('guest/command');
			}			
		}
	}

	function index() {
		$data ['register']=$this->Muser->isregister();
	    $this->load->view('guest/login',$data);
	}
	
	function cek_login() {
		$data = array(
			'nis' => $this->input->post('nis', TRUE),
			'password' => md5($this->input->post('password', TRUE))
		);
		$this->load->model('Muser');
		$hasil = $this->Muser->cek_user($data);
		if ($hasil->num_rows() == 1) {
			$user = $hasil->result()[0];
			$this->session->set_userdata(array(
				'logged_in'  	=> 'Sudah Login',
				'id'			=> $user->id,
				'nis'			=> $user->nis,
				'name'			=> $user->name,
				'email'			=> $user->email,
				'level'			=> $user->level
			));
			if ($this->session->userdata('level')=='admin') {
				redirect('admin/index');
			}
			elseif ($this->session->userdata('level')=='siswa') {
				redirect('student/index');
			}		
		}
		else {
			echo "<script>alert('Maaf, NIS dan atau Password tidak terdaftar.');history.go(-1);</script>";
		}
	}
	  
}

?>