<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gejala_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    function get_gejala($params = FALSE)
    {
        if ($params === FALSE) 
        {
            $query = $this->db->get('tbl_gejala');
            return $query->result_array();
        } else {
            $query = $this->db->get_where('tbl_gejala', array('id_gejala'=>$params));
            return $query->row_array();
        }  
    }

    function create_gejala()
    {

         $data = array(
            'id_gejala' => $this->input->post('id_gejala'),
            'gejala' => $this->input->post('gejala')
        );
         return $this->db->insert('tbl_gejala',$data);
    }

    function last_id(){
        $query = $this->db->query('select id_gejala from tbl_gejala order by id_gejala desc limit 1');
        return $query->row_array();
    }

    function set_update()
    {
         $data = array(
            'gejala' => $this->input->post('gejala')
        );  
        
        $this->db->where('id_gejala', $this->input->post('id_gejala'));
        $this->db->update('tbl_gejala',$data);
    }

    function delete($id)
    {
        $this->db->where('id_gejala', $id);
        $this->db->delete('tbl_gejala');
    }
}