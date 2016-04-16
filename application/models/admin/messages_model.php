<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Messages_model extends CI_Model {

    var $name   = '';
    var $message = '';
    var $contact = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }

    /*** Check Login Credentials ***/

    function get_admin()
    {
        $sql = $this->db->query("SELECT email_address FROM admin_registrations");
        $res = $sql->result();
        foreach ($res as $value) {
            $email = $value->email_address;
        }
        return $email;
    }

    function check_credentials($email,$password)
    {
        $sql = $this->db->query("SELECT email_address,password FROM admin_registrations 
        WHERE email_address = '$email' AND password = '$password' ");
        $result = $sql->result();
        if(!empty($result))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    /*** End Login Check ***/

    function get_all_entries()
    {
       
        $query = $this->db->order_by("id", "desc")
                          ->get('admin_messages');
        return $query->result();
    }

    function check_advocate($email)
    {
        $query = $this->db->where('email', $email)
                          ->get('admin_messages');
     
       if($query->result())
       {  return true;}
        else {  return false; }
    }

    function check_advocate_ph($phone_number)
    {
        $query = $this->db->where('phone_number', $phone_number)
                          ->get('admin_messages');
     
       if($query->result())
       {  return true;}
        else {  return false; }
    }

    function insert_entry($data)
    {	
   

		$this->email   = $data['email']; // please read the below note
        $this->password = $data['password'];
        $this->name = $data['name'];
		 $this->phone_number = $data['phone_number'];
        $this->address = $data['address'];
        $this->date    = Date('Y-m-d h:i:s');
    	$this->modified_date    = Date('Y-m-d h:i:s');
        $this->db->insert('admin_messages', $this);
    }

    function update_entry($data)
    {
      $this->email   = $data['email']; // please read the below note
        $this->password = $data['password'];
        $this->name = $data['name'];
		 $this->phone_number = $data['phone_number'];
        $this->address = $data['address'];
        $this->date    = Date('Y-m-d h:i:s');
		$this->modified_date    = Date('Y-m-d h:i:s');
		//print_r($data['id']);
		//exit;
        $this->db->update('admin_messages', $this, array('id' => $data['id']));
    }

    function delete_entry($id)
    {
        $this->db->delete('admin_messages', array('id' => $id));
    }

    function get_entry($id){
        $this->db->where('id', $id);
        $query = $this->db->get('admin_messages', 1);
        return $query->result();
    }
	
	 function get_all_relations()
    {       
		$query = $this->db->get('admin_relations');
        return $query->result();
    }




}