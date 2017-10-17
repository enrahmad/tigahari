<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Muser extends CI_Model
{
	public function __construct () {
		$this->load->database();
	}

	function detailAdmin($param) {
	  	$data=$this->db->query("SELECT * FROM `user` where `id` = $param ");
        return  $data;}

	function login ($nis, $password) {
		$this->db->select('id, nis, password');
		$this->db->from ('user');
		$this->db->where('nis', $nis);
		$this->db->where('password', md5($password));
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		} else {
			return false;
		}
	}

	function cek_user($data) {
			$query = $this->db->get_where('user', $data);
			return $query;
		}
		
	function loginAdmin($param) {
        $sql = "SELECT * FROM `user` WHERE `nis` = ? and `password` = ?";
        $query = $this->db->query($sql, $param);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function check_user_exist($nis) {
	    $this->db->where('nis',$nis);
	    $query= $this->db->get('user');
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

	function read() {
		$query = $this->db->get('user');
		return $query;
	}
	
	function isregister () {
		$this->db->select('*');
		$this->db->from('setting');
		$this->db->where('name','register');
		$data=$this->db->get();
		if ($data->row()->value=='true') {
			return true;
		} else {
			return false;
		}
	}

	function setregister ($isregister) {
		$this->db->where('name','register');
        $this->db->update('setting',array('value'=>$isregister));
	}
		

	function read_profile() {
		$id = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id',$id);
		$data=$this->db->get();
		return $data;
	}

	function update($id){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id',$id);
		$data=$this->db->get();
		return $data;
	}

	function do_update_user($id,$nis,$name,$class,$email,$level) {
		$data=array ('id'=>$id,'nis'=>$nis,'name'=>$name,'class'=>$class,'email'=>$email,'level'=>$level);
        $this->db->where('id',$id);
        $this->db->update('user',$data);
	}

	function do_update_password($id,$password) {
		$data=array ('id'=>$id,'password'=>$password);
        $this->db->where('id',$id);
        $this->db->update('user',$data);
	}
	
	function delete ($nis){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('nis', $nis);
		$canDelete = $this->db->get()->row();
		
		if($canDelete->remove == 'true'){
			$this->db->delete('user',array('nis'=>$nis));
		}
		return "data tidak bisa di hapus";
	}
}