<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Property_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /*** Immovable property(Itemized view) ***/

    public function insert_immov_property($data)
    {
        $sql = $this->db->insert('immovable_propertys',$data);
        if($sql == 1)
        {
            return true;
        }
    }

    public function get_immov_prop_details()
    {
        $sql = $this->db->query("SELECT * FROM immovable_propertys");
        return $sql->result();
    }

    /** End Immovable Property(Itemized view) **/

    /** Movable Property(Itemized view) **/

    public function insert_mov_property($data)
    {
        $sql = $this->db->insert('movable_propertys',$data);
        if($sql == 1)
        {
            return true;
        }
    }

    public function get_mov_prop_details()
    {
        $sql = $this->db->query("SELECT * FROM movable_propertys");
        return $sql->result();
    }

    /** End Movable Property **/

    public function get_all_property()
    {
        $sql = $this->db->query("SELECT name FROM immovable_propertys");
        $result = $sql->result();
        return $result;
    }

    public function get_family_members()
    {
        $sql = $this->db->query("SELECT * FROM familys");
        $result = $sql->result();
        return $result;
    }
	
	public function get_by_id($id){
		$this->db->where('Immovable_id', $id);
		return $this->db->get('immovable_propertys');
	}
}