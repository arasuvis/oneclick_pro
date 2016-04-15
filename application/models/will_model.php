<?php 

class Will_model extends CI_Model
{
	function get_will_details()
	{
			$this->load->library('mydb');
			return $arr  = $this->mydb->GetMultiResults("CALL Proc_willdetails(28,7,0)");			
	}

		
}
?>