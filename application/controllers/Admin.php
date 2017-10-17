<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('Muser');
        $this->load->model('Mcommand');
        $this->load->model('Msetting');
        if ($this->session->userdata('level')=="siswa") {
            redirect('home');
        }
        elseif($this->session->userdata('level')=="") {
            redirect('home');
        }else{
        $this->load->helper('text');
        }
    }

    public function index() {
        $this->load->view('admin/dashboard');   
    }

    function dashboard() {
        $this->load->view('admin/dashboard');
    }

    function command() {
        $data['result_array']=$this->Mcommand->read('command')->result();
        $this->load->view('admin/command/read',$data);  
    }

    function user(){
        $data ['register']=$this->Muser->isregister();
        $data['result_array']=$this->Muser->read('user')->result();
        $this->load->view('admin/user/read',$data);
    }

    function setregister($isregister) {
        $this->Muser->setregister($isregister);
        redirect ('admin/user');
    }

    function vc() {
        $data['result_array']=$this->Muser->read_profile('user')->result();
        $data['server'] = $this->Msetting->read()->result();
        $data['port'] = $this->session->nis;
        $this->load->view('admin/vc', $data);
    }

    function update_server() {
        $servercpu=$this->input->post('servercpu',TRUE);
        $serverram=$this->input->post('serverram',TRUE);
        $serverswap=$this->input->post('serverswap',TRUE);
        $serveros=$this->input->post('serveros',TRUE);
        $serverip=$this->input->post('serverip',TRUE);
        $dockerver=$this->input->post('dockerver',TRUE);
        $dockeros=$this->input->post('dockeros',TRUE);
        $wettydir=$this->input->post('wettydir',TRUE);
        $wettyport=$this->input->post('wettyport',TRUE);
        $vcpackage=$this->input->post('vcpackage',TRUE);
        $username=$this->input->post('username',TRUE);
        $password=$this->input->post('password',TRUE);
        $this->Msetting->update_server($servercpu,$serverram,$serverswap,$serveros,$serverip,$dockerver,$dockeros,$wettydir,$wettyport,$vcpackage,$username,$password);
        redirect ('admin/vc');
    }

    function faq(){
        $this->load->view('admin/faq');
    }
    
    function license(){
        $this->load->view('admin/license');
    }

    function logout() {
        session_destroy();  
        redirect('home');
    }

}