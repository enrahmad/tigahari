<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('Mcommand');
		$this->load->model('Muser');
	}

    public function index() {
    	if(isset ($_SESSION['admin'])){
            redirect('home');
    	}
        $data = array();
        $data['result_array']=$this->Mcommand->read('command')->result();
        $this->load->view('guest/command',$data);
    }
    
    function command() {
        $data['result_array']=$this->Mcommand->read('command')->result();
        $this->load->view('guest/command',$data);
    }

    function faq() {
        $this->load->view('guest/faq');
    }

    function license() {
        $this->load->view('guest/license');
    }

    function login(){
        $data ['register']=$this->Muser->isregister();
        $this->load->view('guest/login',$data);
    }

    function register() {
        $this->load->view('guest/register');
        $nis = $this->input->post('nis');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        if (!empty($nis && $name && $email && $password)) {
            $data=array(
                //nama kolom => nama variabel
                'nis' => $nis,
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ) ;
            //memasukkan array kedalam database tabel user
            $this->Muser->create($data,'user');
            exec("docker create --name $nis -p $nis:3000 xtime");
            redirect ('guest/login');
        }
    }

}