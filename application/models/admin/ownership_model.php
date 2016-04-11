<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ownership_model extends CI_Model {

    var $name   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
    
    function get_all_ownership()
    {       
        $query = $this->db->get('admin_ownership');
        return $query->result();
    }

    function insert_entry($data)
    {		
		
        $this->name = $data['name'];
        $this->date    = Date('Y-m-d h:i:s');
		$this->modified_date    = Date('Y-m-d h:i:s');
        $this->db->insert('admin_ownership', $this);
    }

    function update_entry($data)
    {
     
        $this->name = $data['name'];
        $this->date    = Date('Y-m-d h:i:s');
		$this->modified_date    = Date('Y-m-d h:i:s');
        $this->db->update('admin_ownership', $this, array('own_id' => $data['id']));
    }

    function delete_entry($id)
    {
        $this->db->delete('admin_ownership', array('own_id' => $id));
    }

    function get_entry($id){
        $this->db->where('own_id', $id);
        $query = $this->db->get('admin_ownership', 1);
        return $query->result();
    }



}