<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Command extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Mcommand');
	}
	
	function read() {
		$data['result_array']=$this->Mcommand->read('command')->result();
		$this->load->view('admin/command/read',$data);	
	}

	function create() {
		//memasukkan data name, use dan desc kedalam variabel
		$name = $this->input->post('name');
		$desc = $this->input->post('desc');
		$use = $this->input->post('use');
		$example = $this->input->post('example');
		$opt = $this->input->post('opt');
		//memasukkan variabel $nama, $use dan $desc yang telah diisi
		//kedalam array berdasarkan nama kolom tabel
		if (!empty($name && $use && $desc)) {
			$data=array(
				//nama kolom => nama variabel
				'name'=> $name,
				'desc'=> $desc,
				'use'=> $use,
				'example'=> $example,
				'opt'=> $opt,
				) ;
			//memasukkan array kedalam database tabel command
			$this->Mcommand->create($data,'command');
		}
		redirect('command/read');
	}

	function check_command() {
		$name= $this->input->post('name'); 
		$result= $this->Mcommand->check_command_exist($name); 
		if($result==0) {
			$isAvailable = true;
		} else {
			$isAvailable = false;
		} 
		echo json_encode(array( 'valid' => $isAvailable,));
	}

	function update($id) {
		$data['hasil']=$this->Mcommand->update($id);		
		$this->load->view('admin/command/read',$data);
	}

	function do_update_command() {
		$id=$this->input->post('id',TRUE);
		$name=$this->input->post('name',TRUE);
		$use=$this->input->post('use',TRUE);
		$desc=$this->input->post('desc',TRUE);
		$opt=$this->input->post('opt',TRUE);
		$example=$this->input->post('example',TRUE);
		$this->Mcommand->do_update_command($id,$name,$use,$desc,$opt,$example);
		redirect('command/read');
	}

	function delete($id){
		$this->Mcommand->delete($id);
		redirect('command/read');
	}

}