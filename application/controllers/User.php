<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Muser');
	}

	function read() {
		$data ['register']=$this->Muser->isregister();
		$data['result_array']=$this->Muser->read('user')->result();
		$this->load->view('admin/user/read',$data);	
	}

	function create() {
		$nis = $this->input->post('nis');
		$name = $this->input->post('name');
		$class = $this->input->post('class');
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$level = $this->input->post('level');
		//memasukkan variabel $nama, $use dan $desc yang telah diisi
		//kedalam array berdasarkan nama kolom tabel
		if (!empty($nis && $name && $email && $password && $level)) {
			$data=array(
				//nama kolom => nama variabel
				'nis'=> $nis,
				'name'=> $name,
				'class'=> $class,
				'email'=> $email,
				'password'=> $password,
				'level' => $level
				) ;
			//memasukkan array kedalam database tabel command
			$this->Muser->create($data,'user');
			exec("docker create --name $nis -p $nis:3000 xtime");
		}
		redirect('user/read');
	}

	function check_nis() {
		$nis= $this->input->post('nis'); 
		$result= $this->Muser->check_user_exist($nis); 
		if($result==0) {
			$isAvailable = true;
		} else {
			$isAvailable = false;
		} 
		echo json_encode(array( 'valid' => $isAvailable,));
	}

	function do_update_password() {
		$id=$this->input->post('id',TRUE);
		$password=md5($this->input->post('password',TRUE));
		$this->Muser->do_update_password($id,$password);
		if ($level == 'admin') {
			redirect('user/read');
		} else {
			redirect('student/vc');
		}		
	}

	function update($id) {
		$data['user']=$this->Muser->update($id);
		$this->load->view('admin/user/update',$data);
	}

	function do_update_user() {
		$id=$this->input->post('id',TRUE);
		$nis=$this->input->post('nis',TRUE);
		$name=$this->input->post('name',TRUE);
		$class=$this->input->post('class',TRUE);
		$email=$this->input->post('email',TRUE);
		$level=$this->input->post('level',TRUE);
		$this->Muser->do_update_user($id,$nis,$name,$class,$email,$level);
		if ($level == 'admin') {
			redirect('user/read');
		} else {
			redirect('student/vc');
		}		
	}

	function delete($nis){
		exec("docker stop $nis");
		exec("docker rm $nis");
		$this->Muser->delete($nis);
		redirect('user/read');
	}
}