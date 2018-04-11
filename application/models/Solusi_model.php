<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Solusi_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    function get_solusi($params = FALSE)
    {
        if ($params === FALSE) 
        {
            // $query = $this->db->get('tbl_solusi');
            $this->db->select('*');
            $this->db->from('tbl_solusi');
            $this->db->join('tbl_kerusakan', 'tbl_solusi.id_kerusakan = tbl_kerusakan.id_kerusakan');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $query = $this->db->get_where('tbl_solusi', array('id_solusi'=>$params));
            return $query->row_array();
        }  
    }

    function create_solusi()
    {

         $data = array(
            'id_solusi' => $this->input->post('id_solusi'),
            'solusi' => $this->input->post('solusi'),
            'id_kerusakan' => $this->input->post('id_kerusakan')
        );
         return $this->db->insert('tbl_solusi',$data);
    }

    function last_id(){
        $query = $this->db->query('select id_solusi from tbl_solusi order by id_solusi desc limit 1');
        return $query->row_array();
    }

    function set_update()
    {
         $data = array(
            'solusi' => $this->input->post('solusi'),
            'id_kerusakan' => $this->input->post('id_kerusakan')
        );  
        
        $this->db->where('id_solusi', $this->input->post('id_solusi'));
        $this->db->update('tbl_solusi',$data);
    }

    function delete($id)
    {
        $this->db->where('id_solusi', $id);
        $this->db->delete('tbl_solusi');
    }
}