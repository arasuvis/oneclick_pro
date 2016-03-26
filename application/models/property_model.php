<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Property_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();	
    }

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
}