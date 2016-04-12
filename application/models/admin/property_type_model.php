<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Property_type_model extends CI_Model {

    var $name   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
    
    function get_all_property()
    {       
        $query = $this->db->get('admin_property');
        return $query->result();
    }

    function insert_entry($data)
    {		
		
        $this->name = $data['name'];
        $this->date    = Date('Y-m-d h:i:s');
		$this->modified_date    = Date('Y-m-d h:i:s');
        $this->db->insert('admin_property', $this);
    }

    function update_entry($data)
    {
     
        $this->name = $data['name'];
        $this->date    = Date('Y-m-d h:i:s');
		$this->modified_date    = Date('Y-m-d h:i:s');
        $this->db->update('admin_property', $this, array('prop_id' => $data['id']));
    }

    function delete_entry($id)
    {
        $this->db->delete('admin_property', array('prop_id' => $id));
    }

    function get_entry($id){
        $this->db->where('prop_id', $id);
        $query = $this->db->get('admin_property', 1);
        return $query->result();
    }



}