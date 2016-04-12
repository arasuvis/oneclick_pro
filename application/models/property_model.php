<?php
class Property_model extends CI_Model {
	
	public $tbl_property = 'immovable_propertys';
	public $tbl_property2 = 'movable_propertys';
	public $tbl_property3 = 'not_allocated_details';

	function __construct(){     
		parent::__construct();
	}
	
	public function list_all(){
		$this->db->order_by('Immovable_id','asc');
		return $this->db->get($tbl_property);
	}
	
	public function count_all(){
		return $this->db->count_all($this->tbl_property);
	}
	
	public function get_paged_list(){
		
		$this->db->select('immovable_propertys.Immovable_id,immovable_propertys.address,immovable_propertys.municipal_number,immovable_propertys.area,immovable_propertys.year_of_purchase,admin_property.name as name,admin_property.prop_id,admin_ownership.name as ownership','admin_ownership.own_id');
		$this->db->from('immovable_propertys');
		$this->db->join('admin_property','admin_property.prop_id=immovable_propertys.name','left');
		$this->db->join('admin_ownership','admin_ownership.own_id=immovable_propertys.nature_of_ownership','left');
		$this->db->order_by('Immovable_id','asc');
		$query = $this->db->get();
		
		return $query;
	}
	
	public function get_by_id($id){
		$this->db->where('Immovable_id', $id);
		return $this->db->get($this->tbl_property);
	}
	
	public function save($person){		
		$this->db->insert($this->tbl_property, $person);
		return $this->db->insert_id();
	}
	
	public function update($id, $person){
		$this->db->where('Immovable_id', $id);
		$this->db->update($this->tbl_property, $person);
	}
	
	public function delete($id){
		$this->db->where('Immovable_id', $id);
		$this->db->delete($this->tbl_property);
	}

	/**** End Immovable Property ****/

	public function list_all2(){
		$this->db->order_by('movable_id','asc');
		return $this->db->get($tbl_property2);
	}
	
	public function count_all2(){
		return $this->db->count_all($this->tbl_property2);
	}
	
	public function get_paged_list2(){
		$this->db->order_by('movable_id','asc');
		//return $this->db->get($this->tbl_property, $limit, $offset);
		return $this->db->get($this->tbl_property2);
	}
	
	public function get_by_id2($id){
		$this->db->where('movable_id', $id);
		return $this->db->get($this->tbl_property2);
	}
	
	public function save2($mov_property){		
		$this->db->insert($this->tbl_property2, $mov_property);
		return $this->db->insert_id();
	}
	
	public function update2($id, $person){
		$this->db->where('movable_id', $id);
		$this->db->update($this->tbl_property2, $person);
	}
	
	public function delete2($id){
		$this->db->where('movable_id', $id);
		$this->db->delete($this->tbl_property2);
	}

	/*** End Movable Property ***/

	/*** Start Not Allocated Property ***/

	public function list_all3(){
		$this->db->order_by('id','asc');
		return $this->db->get($tbl_property3);
	}
	
	public function count_all3(){
		return $this->db->count_all($this->tbl_property3);
	}
	
	public function get_paged_list3(){
		$this->db->order_by('id','asc');
		//return $this->db->get($this->tbl_property, $limit, $offset);
		return $this->db->get($this->tbl_property3);
	}
	
	public function get_by_id3($id){
		$this->db->where('id', $id);
		return $this->db->get($this->tbl_property3);
	}
	
	public function save3($not_property){		
		$this->db->insert($this->tbl_property3, $not_property);
		return $this->db->insert_id();
	}
	
	public function update3($id, $person){
		$this->db->where('id', $id);
		$this->db->update($this->tbl_property3, $person);
	}
	
	public function delete3($id){
		$this->db->where('id', $id);
		$this->db->delete($this->tbl_property3);
	}

	public function get_family_member()
	{
		$sql = $this->db->query("SELECT user_id_new,familyid,firstname FROM nodes");
		return $sql->result();
	}

	public function get_member_name($mem_id)
	{
		$sql = $this->db->query("SELECT firstname FROM nodes WHERE user_id_new='$mem_id'");
		return $sql->result();
	}

	/*** End Not Allocated Property ***/

}
?>