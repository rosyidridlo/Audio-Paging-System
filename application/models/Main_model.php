<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function valid_check($user,$pass){
    	$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		
		$feedback = $this->db->get();
		return $feedback;
    }
}

?>