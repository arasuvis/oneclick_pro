<?php 

class Will_model extends CI_Model
{
	function get_will_details($data)
	{		
		$this->db->select('*');
		$this->db->from('user_register');
		$this->db->where('user_id',3);
		//$this->db->join('familys', 'familys.user_id = user_register.user_id', 'inner');
		//$this->db->join('immovable_propertys', 'immovable_propertys.user_id = user_register.user_id', 'inner');
		//$this->db->join('movable_propertys', 'movable_propertys.user_id = user_register.user_id', 'inner');
		//$this->db->join('not_allocated_details', 'not_allocated_details.user_id = user_register.user_id', 'inner');
		$query = $this->db->get();
		$result = $query->result();
		if($result)
		{
			return $result;
		}
		else
		{
			return false;
		}
	}

	
}
?>