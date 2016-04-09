<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function index()
	{
		
		$data['entry'] =  $this->messages_model->get_entry($this->uri->segment(4, 0));
		if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
			echo "error";
		}
		else
		{
			$data['entry'] = $data['entry'][0];
			
			$this->load->view('admin/header');
			$this->load->view('admin/leftbar');
			$this->load->view('admin/edit_view', $data);
			$this->load->view('admin/footer');
		}
	}

	
	public function input()
		{
		$this->form_validation->set_rules('name','Name','trim|required|alpha');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('phone_number','Mobile Number','trim|required|integer|exact_length[10]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		
		if($this->form_validation->run())
		{
			$data['email'] = $this->input->post('email');
			$data['id'] = $this->input->post('id');
			$data['password'] = $this->input->post('password');
			$data['name'] = $this->input->post('name');
			$data['phone_number'] = $this->input->post('phone_number');
			$data['address'] = $this->input->post('address');
			$this->messages_model->update_entry($data);
		}
		else{
			$this->load->view('admin/header');
			$this->load->view('admin/leftbar');
			$this->load->view('admin/edit_view');
			$this->load->view('admin/footer');
		}
		//redirect("admin/admin/index");
	}

	public function delete(){
		
		if($this->uri->segment(4, 0) != ""){
			$this->messages_model->delete_entry($this->uri->segment(4, 0));	
		}
		redirect("admin/admin/index");
	}	
	
	public function update_view()
	{
		
		$data['entry'] =  $this->relations_model->get_entry($this->uri->segment(4, 0));
		if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
			echo "error";
		}
		else
		{
			$data['entry'] = $data['entry'][0];
			$this->load->view('admin/header');
			$this->load->view('admin/leftbar');
			$this->load->view('admin/relations/edit_view', $data);
			$this->load->view('admin/footer');
		}
	}
	
	public function edit_relation(){

		if(
			$this->input->post('name') != ""
		)
		{			
			$data['id'] = $this->input->post('id');
			$data['name'] = $this->input->post('name');
			$this->relations_model->update_entry($data);			
		}
		else{
			
		}
		redirect("admin/admin/relation");
	}
	
	public function delete_relation(){
		
		if($this->uri->segment(4, 0) != ""){
			$this->relations_model->delete_entry($this->uri->segment(4, 0));	
		}
		redirect("admin/create/relation");
	}
}