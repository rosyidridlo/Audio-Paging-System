<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    function get_user($params = FALSE)
    {
        if ($params === FALSE) 
        {
            $query = $this->db->get('tbl_user');
            return $query->result_array();
        } else {
            $query = $this->db->get_where('tbl_user', array('id_user'=>$params));
            return $query->row_array();
        }
    }

    function create_user()
    {

        $data = array(
            'id_user' => $this->input->post('id_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'gender' => $this->input->post('gender'),
            'no_telp' => $this->input->post('telp')
        );
         return $this->db->insert('tbl_user',$data);
    }

    function last_id(){
        $query = $this->db->query('select id_user from tbl_user order by id_user desc limit 1');
        return $query->row_array();
    }

    function set_update()
    {
         $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'gender' => $this->input->post('gender'),
            'no_telp' => $this->input->post('telp')
        );  
        
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('tbl_user',$data);
    }

    function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tbl_user');
    }
}