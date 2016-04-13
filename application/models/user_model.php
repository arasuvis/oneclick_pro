<?php 

class User_model extends CI_Model
{
	function save_reg($data)
	{
		$query = $this->db->insert('user_register',$data);
					
		return $this->db->insert_id();
		
	}

	function reg_will_id($id)
	{
		$status = 0;
		$name = "Default Will";
		$query = $this->db->query("INSERT INTO `tbl_will`(`will_name`,`user_id`, `status`) VALUES ('$name','$id','$status')");

		if($this->db->insert_id())
		{
			return $this->db->insert_id();
		}
		else
		{
			return false; 
		}
		
	}

	function login_valid($email,$password)
	{
		$pass = md5($password);
		$sql = "Select * from user_register where email='$email' and password='$pass' ";
		$res = $this->db->query($sql);
		$result = $res->result();
		if(!empty($result))
		{
			return $result[0]->user_id;	
		}
		else
		{
			return false;
		}
	}


	function get_will_id($log_id)
	{
		$query = $this->db->select_max('will_id')
				 ->where('user_id',$log_id)
				 ->get('tbl_will');
				 
		return $query->row()->will_id;
	}

	function get_will()
	{
		return $query = $this->db->get('tbl_will');
	}

	function forgot_pass($email)
	{
		$sql = "select * from user_register where email='$email' ";
		$res = $this->db->query($sql);

		if($res->num_rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function resetpassword($pass,$email)
	{	
		$password = array( 'password' => $pass );	
		$this->db->where('email', $email);
		$res = $this->db->update('user_register', $password);
		if($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function current($pass)
	{
		$id = $this->session->userdata['is_userlogged_in']['user_id'];
		$sql = "select * from user_register where user_id='$id'  ";
		$res = $this->db->query($sql);
		$password = $res->row()->password;
		if($pass == $password)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function change_pass($newpass)
	{
		$id = $this->session->userdata['is_userlogged_in']['user_id'];
		$sql = "update user_register set password = '$newpass' where user_id = '$id'  ";
		$res = $this->db->query($sql);
		if($res)
		{
			
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>