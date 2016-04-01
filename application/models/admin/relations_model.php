<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Relations_model extends CI_Model {

    var $name   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
    
    function get_all_relations()
    {       
        $query = $this->db->get('admin_relations');
        return $query->result();
    }

    function insert_entry($data)
    {		
		
        $this->name = $data['name'];
        $this->date    = Date('Y-m-d h:i:s');
		$this->modified_date    = Date('Y-m-d h:i:s');
        $this->db->insert('admin_relations', $this);
    }

    function update_entry($data)
    {
     
        $this->name = $data['name'];
        $this->date    = Date('Y-m-d h:i:s');
		$this->modified_date    = Date('Y-m-d h:i:s');
        $this->db->update('admin_relations', $this, array('rel_id' => $data['id']));
    }

    function delete_entry($id)
    {
        $this->db->delete('admin_relations', array('rel_id' => $id));
    }

    function get_entry($id){
        $this->db->where('rel_id', $id);
        $query = $this->db->get('admin_relations', 1);
        return $query->result();
    }



}