<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create extends CI_Controller {


	public function index()
	{

		$data['messages'] = "";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/leftbar', $data);
			$this->load->view('admin/create_view');
			$this->load->view('admin/footer');
	}

	public function input(){

		
		$this->form_validation->set_rules('name','Name','trim|required|alpha');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('phone_number','Mobile Number','trim|required|integer|exact_length[10]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		
		if($this->form_validation->run())
		{
			
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
			$data['name'] = $this->input->post('name');
			$data['phone_number'] = $this->input->post('phone_number');
			$data['address'] = $this->input->post('address');
			$this->messages_model->insert_entry($data);
			redirect("admin/create/index");	
		}
		else
		{
			$this->load->view('admin/header');
			$this->load->view('admin/leftbar');
			$this->load->view('admin/create_view');
			$this->load->view('admin/footer');
				
		}
		//redirect("admin/index");
	}	
	
	public function relation()
	{
		$messages = $this->relations_model->get_all_relations();
		$data['messages'] = $messages;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/leftbar', $data);
		$this->load->view('admin/relations/relations', $data);
		$this->load->view('admin/footer', $data);
	}

	public function add_relation()
	{

		$data['messages'] = "";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/leftbar', $data);
			$this->load->view('admin/relations/create_view');
			$this->load->view('admin/footer');
	}
	
	public function insert_relation(){
			$this->form_validation->set_rules('name','Name','trim|required|alpha');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			if($this->form_validation->run())
				{
					$data['name'] = $this->input->post('name');
					$this->relations_model->insert_entry($data);
					redirect("admin/create/relation");	
		
				}
				else{
					$this->load->view('admin/header');
				$this->load->view('admin/leftbar');
				$this->load->view('admin/relations/create_view');
				$this->load->view('admin/footer');
					}
		
	}
}