<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct(){
		parent::__construct();
		$this->load->database();
	}

    /** Implement function get_all for get all rows  our user table */
    public function get_all()
    {
        //$this->db->limit($start, $page_size);
        $q = $this->db->get('codigoscamp');
        return $q;        
    }

    /** Implement function get_by_id for get row with id our user table */
    public function get_by_id($id)
    {        
        $q = $this->db->get_where("codigoscamp", ['Id' => $id]);
        return $q;
    }

    public function save($data)
    {     
        return $this->db->insert('codigoscamp', $data);        
    }

    public function edit($id, $data)
    {        
        $this->db->where('Id', $id);
        return $this->db->update('codigoscamp', $data);        
    }

    public function delete($id)
    {        
        $this->db->where('Id', $id);        
       return $this->db->delete('codigoscamp');        
    }
}