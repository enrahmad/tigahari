<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msetting extends CI_Model{

        function read() {
                $query = $this->db->get('setting');
                return $query;
        }

        function update_server($servercpu,$serverram,$serverswap,$serveros,$serverip,$dockerver,$dockeros,$wettydir,$wettyport,$vcpackage,$username,$password) {
        $this->db->where('name','servercpu');
        $this->db->update('setting',array('value'=>$servercpu));
        $this->db->where('name','serverram');
        $this->db->update('setting',array('value'=>$serverram));
        $this->db->where('name','serverswap');
        $this->db->update('setting',array('value'=>$serverswap));
        $this->db->where('name','serveros');
        $this->db->update('setting',array('value'=>$serveros));
        $this->db->where('name','serverip');
        $this->db->update('setting',array('value'=>$serverip));
        $this->db->where('name','dockerver');
        $this->db->update('setting',array('value'=>$dockerver));
        $this->db->where('name','dockeros');
        $this->db->update('setting',array('value'=>$dockeros));
        $this->db->where('name','wettydir');
        $this->db->update('setting',array('value'=>$wettydir));
        $this->db->where('name','wettyport');
        $this->db->update('setting',array('value'=>$wettyport));
        $this->db->where('name','vcpackage');
        $this->db->update('setting',array('value'=>$vcpackage));
        $this->db->where('name','username');
        $this->db->update('setting',array('value'=>$username));
        $this->db->where('name','password');
        $this->db->update('setting',array('value'=>$password));
        }
}
