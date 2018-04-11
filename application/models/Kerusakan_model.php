<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kerusakan_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    function get_kerusakan($params = FALSE)
    {
        if ($params === FALSE) 
        {
            $query = $this->db->get('tbl_kerusakan');
            return $query->result_array();
        } else {
            $query = $this->db->get_where('tbl_kerusakan', array('id_kerusakan'=>$params));
            return $query->row_array();
        }  
    }

    function get_kerusakan_solusi()
    {
        $this->db->select('*');
        $this->db->from('tbl_kerusakan');
        $this->db->join('tbl_solusi', 'tbl_kerusakan.id_kerusakan=tbl_solusi.id_kerusakan');
        $query = $this->db->get();
        return $query->result_array();
    }

    function create_kerusakan()
    {

         $data = array(
            'id_kerusakan' => $this->input->post('id_kerusakan'),
            'nama_kerusakan' => $this->input->post('nama_kerusakan'),
            'definisi' => $this->input->post('definisi')
        );
         return $this->db->insert('tbl_kerusakan',$data);
    }

    function last_id(){
        $query = $this->db->query('select id_kerusakan from tbl_kerusakan order by id_kerusakan desc limit 1');
        return $query->row_array();
    }

    function set_update()
    {
         $data = array(
            'nama_kerusakan' => $this->input->post('nama_kerusakan'),
            'definisi' => $this->input->post('definisi')
        );  
        
        $this->db->where('id_kerusakan', $this->input->post('id_kerusakan'));
        $this->db->update('tbl_kerusakan',$data);
    }

    function delete($id)
    {
        $this->db->where('id_kerusakan', $id);
        $this->db->delete('tbl_kerusakan');
    }
}