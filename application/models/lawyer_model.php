<?php
class Lawyer_model extends CI_Model {
	
	public $tbl_lawyer= 'tbl_lawyer';
	
	function __construct(){
		parent::__construct();
	}
	
	public function list_all(){
		$this->db->order_by('id','asc');
		return $this->db->get($tbl_lawyer);
	}
	
	public function count_all(){
		return $this->db->count_all($this->tbl_lawyer);
	}
	
	public function get_paged_list(){
		$this->db->order_by('id','asc');
		//return $this->db->get($this->tbl_lawyer, $limit, $offset);
		return $this->db->get($this->tbl_lawyer);
	}
	
	public function get_by_id($id){
		$this->db->where('id', $id);
		return $this->db->get($this->tbl_lawyer);
	}
	
	public function save($person){		
		$this->db->insert($this->tbl_lawyer, $person);
		return $this->db->insert_id();
	}
	
	public function update($id, $person){
		$this->db->where('id', $id);
		$this->db->update($this->tbl_lawyer, $person);
	}
	
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->tbl_lawyer);
	}
}
?>