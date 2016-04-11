<?php
class Prop_model extends CI_Model {
	
	public $tbl_prop = 'grant_immovable';
	
	function __construct(){
		parent::__construct();
	}
	
	public function list_all(){
		$this->db->order_by('id','asc');
		return $this->db->get($tbl_prop);
	}
	
	public function count_all(){
		return $this->db->count_all($this->tbl_prop);
	}
	
	public function get_paged_list(){
		
		$this->db->select('*');
		$this->db->from('grant_immovable');
		$this->db->join('nodes', 'nodes.user_id_new = grant_immovable.fam_id','left');
		$this->db->join('immovable_propertys', 'immovable_propertys.Immovable_id = grant_immovable.property_id');
		$query = $this->db->get();
		$this->db->order_by('grant_im_id','asc');
		//print_r($this->db->last_query());
		//exit;
		//return $this->db->get($this->tbl_prop, $limit, $offset);
		return $query;
	}
	
	public function get_by_id($id){
		$this->db->where('grant_im_id', $id);
		return $this->db->get($this->tbl_prop);
	}
	
	public function save($person){
		$this->db->insert($this->tbl_prop, $person);
		
		return $this->db->insert_id();
	}
	
	public function update($id, $person){
		$this->db->where('id', $id);
		return $this->db->update($this->tbl_prop, $person);

	}
	
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->tbl_prop);
	}
	
	public function get_family_members(){
		$this->db->order_by('user_id_new','asc');
		//return $this->db->get($this->tbl_prop, $limit, $offset);
		return $this->db->get('nodes');
	}
	public function get_im_property(){
		$this->db->order_by('Immovable_id','asc');
		//return $this->db->get($this->tbl_prop, $limit, $offset);
		return $this->db->get('immovable_propertys');
	}
	
	
}
?>