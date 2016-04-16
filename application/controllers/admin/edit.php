<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/relations_model');
		$this->load->model('admin/property_type_model');
		$this->load->model('admin/ownership_model');
		$this->load->model('admin/messages_model');
		$this->load->model('admin/faq_model'); 
		date_default_timezone_set('Asia/Kolkata');
			}

	private function view()
	{
			$this->load->view('admin/header');
			$this->load->view('admin/leftbar');
			$this->load->view('admin/footer');
	}

	private function delete($model_name,$redirect_name)
	{
		if($this->uri->segment(4, 0) != ""){
			$this->$model_name->delete_entry($this->uri->segment(4, 0));	
		}
		redirect("admin/create/$redirect_name");	
	}

	public function index()
	{
		$data['entry'] =  $this->messages_model->get_entry($this->uri->segment(4, 0));
		if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
			echo "error";
		}
		else
		{
			$data['entry'] = $data['entry'][0];
			
			$this->view();
			$this->load->view('admin/edit_view', $data);
		}
	}

	
	public function input()
		{
		$this->form_validation->set_rules('name','Name','trim|required|callback_alpha_dash_space');
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
			if($this->messages_model->check_advocate($email))
			{

				$this->session->set_flashdata('feedback', 'Email Id Already Exist');
				$this->session->set_flashdata('feedback_color', 'alert-danger');
				//echo 'email id Already Exist'; die();
			}
			else if($this->messages_model->check_advocate_ph($phone_number))
			{
				$this->session->set_flashdata('feedback', 'Phone Number Already Exist');
				$this->session->set_flashdata('feedback_color', 'alert-danger');
			}
			else {
			$this->messages_model->update_entry($data); }
			redirect("admin/admin/index");
		}
		else{
			$this->view();		
			$this->load->view('admin/edit_view');
			}
		
	}

	function alpha_dash_space($str)
	{
    return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? False : TRUE;
	} 

	public function delete_message()
	{
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
			$this->view();
			$this->load->view('admin/relations/edit_view', $data);
		}
	}
	
	public function edit_relation()
	{
		$this->form_validation->set_rules('name','Name','trim|required|callback_alpha_dash_space');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		if($this->form_validation->run())
		{			
			$data['id'] = $this->input->post('id');
			$data['name'] = $this->input->post('name');
			$this->relations_model->update_entry($data);
			redirect("admin/create/relation");			
		}
		else{
			$this->load->view('admin/header');
				$this->load->view('admin/leftbar');
				$this->load->view('admin/relations/edit_view');
				$this->load->view('admin/footer');
		}
		
	}
	
	public function delete_relation()
	{
		$this->delete('relations_model','relation');
	}

	public function update_view_property()
	{
		$data['entry'] =  $this->property_type_model->get_entry($this->uri->segment(4, 0));
		if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
			echo "error";
		}
		else
		{
			$data['entry'] = $data['entry'][0];
			$this->view();
			$this->load->view('admin/property_type/edit_view', $data);
		}
	}

	public function edit_propertye_type()
	{

		$this->form_validation->set_rules('prop_name','Name','trim|required|callback_alpha_dash_space');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			if($this->form_validation->run())
		{			
			$data['id'] = $this->input->post('id');
			$data['prop_name'] = $this->input->post('prop_name');
			$this->property_type_model->update_entry($data);
			redirect("admin/create/property_type");			
		}
		else{
			$this->load->view('admin/header');
				$this->load->view('admin/leftbar');
				$this->load->view('admin/property_type/edit_view');
				$this->load->view('admin/footer');
		}
		
	}

	public function delete_propertye_type()
	{
		$this->delete('property_type_model','property_type');	
	}

	public function update_view_ownership()
	{
		$data['entry'] =  $this->ownership_model->get_entry($this->uri->segment(4, 0));
		if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
			echo "error";
		}
		else
		{
			$data['entry'] = $data['entry'][0];
			$this->view();
			$this->load->view('admin/ownership/edit_view', $data);
		}
	}

	public function edit_ownership()
	{
		$this->form_validation->set_rules('own_name','Name','trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			if($this->form_validation->run())
		{			
			$data['id'] = $this->input->post('id');
			$data['own_name'] = $this->input->post('own_name');
			$this->ownership_model->update_entry($data);
			redirect("admin/create/ownership");			
		}
		else{
			$this->load->view('admin/header');
				$this->load->view('admin/leftbar');
				$this->load->view('admin/ownership/edit_view');
				$this->load->view('admin/footer');
		}
		
	}

	public function delete_ownership()
	{
		$this->delete('ownership_model','ownership');
	}

	public function update_faq()
	{
		$data['messages'] = $this->faq_model->get_all_faq()->result();
		$data['entry'] =  $this->faq_model->get_entry($this->uri->segment(4, 0));
		if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
			echo "error";
		}
		else
		{
			$data['entry'] = $data['entry'][0];
			$this->view();
			$this->load->view('admin/faq/edit_view', $data);
		}
	}

	public function edit_faq()
	{
		if(
			$this->input->post('cat_type_name') != "" && $this->input->post('question') != "" && $this->input->post('answer') != "" 
		)
		{			
			$id = $this->input->post('faq_id');
			$data['cat_type_name'] = $this->input->post('cat_type_name');
			$data['question'] = $this->input->post('question');
			$data['answer'] = $this->input->post('answer');
			$this->faq_model->update_entry($id,$data);			
		}
		else{
			
		}
		redirect("admin/create/faq");
	}

	public function delete_faq()
	{
		$this->delete('faq_model','faq');
	} 

}