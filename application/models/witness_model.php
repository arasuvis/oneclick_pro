<?php
class Witness_model extends CI_Model {
	
	public $tbl_witness= 'tbl_witness';
	
	function __construct(){
		parent::__construct();
	}
	
	public function list_all(){
		$this->db->order_by('witness_id','asc');
		return $this->db->get($tbl_witness);
	}
	
	public function count_all(){
		return $this->db->count_all($this->tbl_witness);
	}
	
	public function get_paged_list(){
		$will_id = $this->session->userdata['is_userlogged_in']['will_id'];
		$this->db->order_by('witness_id','asc');
		return $this->db->where('will_id',$will_id)
						->get($this->tbl_witness);
	}
	
	public function get_by_id($id){
		$this->db->where('witness_id', $id);
		return $this->db->get($this->tbl_witness);
	}
	
	public function save($person){	
		$person['will_id'] = $this->session->userdata['is_userlogged_in']['will_id'] ;	
		$this->db->insert($this->tbl_witness, $person);
		return $this->db->insert_id();
	}
	
	public function update($id, $person){
		$this->db->where('witness_id', $id);
		$this->db->update($this->tbl_witness, $person);
	}
	
	public function delete($id){
		$this->db->where('witness_id', $id);
		$this->db->delete($this->tbl_witness);
	}
}
?>