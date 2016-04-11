<?php 

class family_model extends CI_Model
{
	
	public $tbl_family= 'tbl_family';
	
	function __construct(){
		parent::__construct();
	}
	
	
	function get_paged_list()
	{
		$this->db->order_by('id','asc');
		return $this->db->get('tbl_family');
	}

	function get_relation()
	{
		$this->db->order_by('rel_id','asc');
		return $this->db->select(['rel_id','name'])
						->get('admin_relations');
	}

	function save($family){	
		$this->db->insert($this->tbl_family, $family);
		return $this->db->insert_id();
	}
}

?>