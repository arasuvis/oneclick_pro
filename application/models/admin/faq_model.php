<?php 

class Faq_model extends CI_Model
{
	function get_all_faq()
	{
		$this->db->select('admin_faq.faq_id,admin_faq.cat_type_name,admin_faq.question,admin_faq.answer,admin_category.cat_id,admin_category.name');
		$this->db->from('admin_faq');
		$this->db->join('admin_category','admin_category.cat_id=admin_faq.cat_type_name','left');
		$this->db->order_by('faq_id','asc');
		return $query = $this->db->get();
	}

	function get_all_type()
	{
		return $this->db->get('admin_category');
	}

	function insert_entry($data)
    {		
        $this->db->insert('admin_faq', $data);
    }

    function get_entry($id){
        $this->db->where('faq_id', $id);
        $query = $this->db->get('admin_faq');
       	return $query->result();
       }
}

?>