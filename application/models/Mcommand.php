<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcommand extends CI_Model{

	function read() {
		$query = $this->db->get('command');
		return $query;
	}

	function check_command_exist($name) {
	    $this->db->where('name',$name);
	    $query= $this->db->get('command');
	    if($query->num_rows()>0)
	    	{
	        	return $query->result();
	    	}
	    else
	    	{
	        	return false;
	    	}
	}

	function create($data,$table) {
		$this->db->insert($table,$data);
	}
	
	function update($id) {
        $this->db->select('*');
		$this->db->from('command');
		$this->db->where('id',$id);
		$data=$this->db->get();
		return $data;
	}

	function do_update_command($id,$name,$use,$desc,$opt,$example) {
		$data=array ('id'=>$id,'name'=>$name,'use'=>$use,'desc'=>$desc,'opt'=>$opt,'example'=>$example);
        $this->db->where('id',$id);
        $this->db->update('command',$data);
	}

	function delete ($id){
		$this->db->delete('command',array('id'=>$id));
	}
	
}
