<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('Muser');
		$this->load->model('Mcommand');
        $this->load->model('Msetting');
		$this->load->library('session');
        if ($this->session->userdata('level')=="admin") {
			redirect('home');
		}elseif($this->session->userdata('level')=="") {
			redirect('home');
		}else{
		$this->load->helper('text');
		}
	}

	function login(){
		$this->load->view('user/login');
    }

	function index() {
		$data['result_array'] =$this->Mcommand->read('command')->result();
		$this->load->view('student/command',$data);
	}
    
	function command() {
		$data['result_array']=$this->Mcommand->read('command')->result();
		$this->load->view('student/command',$data);
	}

	function vc() {
		//profile
		$data['result_array']=$this->Muser->read_profile('user')->result();
		//port vc
		$data['port'] = $this->session->nis;
		$data['server'] = $this->Msetting->read()->result();
		$this->load->view('student/vc', $data);
	}

	function profile() {
		$data['result_array']=$this->Muser->read_profile('user')->result();
		$this->load->view('student/profile',$data);
	}

	function faq() {
		$this->load->view('student/faq');
	}

	function license() {
		$this->load->view('student/license');
	}

	function logout() {
		$this->session->unset_userdata('nis');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('guest');
	}

}