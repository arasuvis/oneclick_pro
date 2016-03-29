<?php 

class User_model extends CI_Model
{
	function save_reg($data)
	{
		$this->db->insert('user_register',$data);

		$get =  $this->db->get('user_register');
		if($get)
		{
			return true;
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
			return $result[0]->email;	
		}
		else
		{
			return false;
		}
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
		$id = $this->session->userdata['id'];
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
		$id = $this->session->userdata['id'];
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