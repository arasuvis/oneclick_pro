<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/relations_model');
		$this->load->model('admin/property_type_model');
		$this->load->model('admin/ownership_model');
		$this->load->model('admin/messages_model');  
		$this->load->model('admin/faq_model'); 
		$this->load->library('session');
	}

	public function index()
	{

		$data['messages'] = "";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/leftbar', $data);
			$this->load->view('admin/create_view');
			$this->load->view('admin/footer');
	}

	public function input(){

		$this->form_validation->set_rules('name','Name','trim|required|alpha|	max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required_	max_length[30]');
		$this->form_validation->set_rules('phone_number','Mobile Number','trim|required|integer|exact_length[10]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		
		if($this->form_validation->run())
		{
			$email = $this->input->post('email');
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
			$data['name'] = $this->input->post('name');
			$data['phone_number'] = $this->input->post('phone_number');
			$data['address'] = $this->input->post('address');
			if($this->messages_model->check_advocate($email))
			{

				$this->session->set_flashdata('feedback', 'Record Already Exist');
				$this->session->set_flashdata('feedback_color', 'alert-danger');
				//echo 'email id Already Exist'; die();
			}
			else{
				$this->messages_model->insert_entry($data); }
			redirect("admin/admin/index");	
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

			$this->form_validation->set_rules('name','Name','trim|required|	max_length[30]');
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

	public function property_type()
	{
		$messages = $this->property_type_model->get_all_property();
		$data['messages'] = $messages;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/leftbar', $data);
		$this->load->view('admin/property_type/properties', $data);
		$this->load->view('admin/footer', $data);
	}

	public function add_property_type()
	{

		$data['messages'] = "";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/leftbar', $data);
			$this->load->view('admin/property_type/create_view');
			$this->load->view('admin/footer');
	}

	
	public function insert_property_type(){

			$this->form_validation->set_rules('prop_name','Name','trim|required|	max_length[30]');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			if($this->form_validation->run())
				{
					$data['prop_name'] = $this->input->post('prop_name');
					$this->property_type_model->insert_entry($data);
					redirect("admin/create/property_type");	
		
				}
				else{
					$this->load->view('admin/header');
				$this->load->view('admin/leftbar');
				$this->load->view('admin/property_type/create_view');
				$this->load->view('admin/footer');
					}
			}

	public function ownership()
	{
		$messages = $this->ownership_model->get_all_ownership();
		$data['messages'] = $messages;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/leftbar', $data);
		$this->load->view('admin/ownership/owners', $data);
		$this->load->view('admin/footer', $data);
	}

	public function add_ownership()
	{

		$data['messages'] = "";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/leftbar', $data);
			$this->load->view('admin/ownership/create_view');
			$this->load->view('admin/footer');
	}

	
	public function insert_ownership(){
			$this->form_validation->set_rules('own_name','Name','trim|required|	max_length[30]');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			if($this->form_validation->run())
				{
					$data['own_name'] = $this->input->post('own_name');
					$this->ownership_model->insert_entry($data);
					redirect("admin/create/ownership");	
		
				}
				else{
					$this->load->view('admin/header');
				$this->load->view('admin/leftbar');
				$this->load->view('admin/ownership/create_view');
				$this->load->view('admin/footer');
					}
			}

	public function faq()
	{
		$messages = $this->faq_model->get_all_faq()->result();
		$data['messages'] = $messages;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/leftbar', $data);
		$this->load->view('admin/faq/faqs', $data);
		$this->load->view('admin/footer', $data);
	}	

	public function add_faq()
	{
		$data['type'] = $this->faq_model->get_all_type()->result();
		$data['messages'] = "";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/leftbar', $data);
			$this->load->view('admin/faq/create_view');
			$this->load->view('admin/footer');
	}	

	public function insert_faq(){
			$this->form_validation->set_rules('cat_type_name','Type','trim|required');
			$this->form_validation->set_rules('question','Question','trim|required');
			$this->form_validation->set_rules('answer','Answer','trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			if($this->form_validation->run())
				{
					$data['cat_type_name'] = $this->input->post('cat_type_name');
					$data['question'] = $this->input->post('question');
					$data['answer'] = $this->input->post('answer');
					$this->faq_model->insert_entry($data);
					redirect("admin/create/faq");	
		
				}
				else{
					$this->load->view('admin/header');
				$this->load->view('admin/leftbar');
				$this->load->view('admin/faq/create_view');
				$this->load->view('admin/footer');
					}
			}
}