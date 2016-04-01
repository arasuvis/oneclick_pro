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
			$data['xxx'] = 'dasd';
			$this->load->view('admin/header');
			$this->load->view('admin/leftbar');
			$this->load->view('admin/edit_view', $data);
			$this->load->view('admin/footer');
		}
	}

	
	public function input(){

		if(
			$this->input->post('exampleInputEmail1') != "" &&
			$this->input->post('exampleInputPassword1') != "" &&
			$this->input->post('name') != ""
		)
		{
			$data['email'] = $this->input->post('exampleInputEmail1');
			$data['id'] = $this->input->post('id');
			$data['password'] = $this->input->post('exampleInputPassword1');
			$data['name'] = $this->input->post('name');
			$data['phone_number'] = $this->input->post('phone_number');
			$data['address'] = $this->input->post('address');
			$this->messages_model->update_entry($data);
			
		}
		else{
			
		}
		redirect("admin/home/index");
	}

	public function delete(){


		if($this->uri->segment(4, 0) != ""){
			$this->messages_model->delete_entry($this->uri->segment(4, 0));	
		}
		redirect("admin/home/index");
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
		redirect("admin/home/relation");
	}
	
	public function delete_relation(){
		if($this->uri->segment(4, 0) != ""){
			$this->relations_model->delete_entry($this->uri->segment(4, 0));	
		}
		redirect("admin/home/relation");
	}
}