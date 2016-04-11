<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Family extends CI_Controller 
{
	public function Family() // Constructor
	{
		parent::__construct();
		$this->load->library(array('table','form_validation'));
	}

	public function index($offset = 0)
	{	//echo "<pre>";
		//print_r($this->config);
		/*$tree = $this->config->item('jtree_url');
		$data['tree_url'] = $tree;
		$this->load->view('family/index',$data); */
		$this->load->model('family_model');
		$family = $this->family_model->get_paged_list()->result();
		$config['base_url'] = site_url('family/index/');// generate table data
		$this->load->library('table');
		    $tmpl = array ( 'table_open'  => 
		'<table border="1" cellpadding="2" cellspacing="1" id="example1" class="table table-striped table-bordered">' );

    	$this->table->set_template($tmpl);

		//$this->table->set_heading('No', 'Name', 'Relationship', 'DOB', 'Marital Status','Status', 'Actions');
		$this->table->set_heading('No', 'Name', 'Relationship', 'DOB', 'Marital Status','Status');
		$i = 0 + $offset;
		foreach ($family as $fam)
		{
			$this->table->add_row(++$i, $fam->name, $fam->relationship, $fam->dob, $fam->marital_status, $fam->status
			//,anchor('users/family/update/'.$fam->id,'update',array('class'=>'update','data-toggle'=>'modal','data-target'=>'#myModal')).' '.
			//	anchor('users/family/delete/'.$fam->id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this person?')"))
			);
		}
		$data['table'] = $this->table->generate();

		$this->load->view('header', $data);
		$this->load->view('family/family_list', $data);
		$this->load->view('footer', $data);
	}

	function add()
	{
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		$this->load->model('family_model');
		$data['rel']=$this->family_model->get_relation()->result();

				// set common properties
		$data['title'] = 'Add new Family';
		$data['message'] = '';
		$data['action'] = site_url('users/family/addFamily');
		$data['link_back'] = anchor('users/family/index/','Back to list of family',array('class'=>'back'));
	
		// load view
		$this->load->view('family/familyEdit', $data);
	}

	function _set_fields()
	{
		@$this->form_data->id = '';
		@$this->form_data->name = '';
		@$this->form_data->relationship = '';
		@$this->form_data->dob = '';
		@$this->form_data->marital_status = '';
		@$this->form_data->status = '';
	}
	
	// validation rules
	function _set_rules()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('relationship', 'Relationship', 'trim|required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
	   $this->form_validation->set_rules('marital_status', 'Marital Status', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}

	function addFamily()
	{
		
		$data['title'] = 'Add New Family';
		$data['action'] = site_url('users/family/addFamily');
		$data['link_back'] = anchor('users/family/index/','Back to list of family',array('class'=>'back'));
		
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['message'] = '';
		}
		else
		{
			// save data
			$family = array('name' => $this->input->post('name'),
			'relationship'=>$this->input->post('relationship'),
			'dob'=>$this->input->post('dob'),
			'marital_status' => $this->input->post('marital_status'),
			'status' => $this->input->post('status'));
			$this->load->model('family_model');
			 $id = $this->family_model->save($family);
			
			// set user message
			$data['message'] = '<div class="success">add new lawyer success</div>';
		}
		
		// load view
		redirect('users/family/index', $data);
	}

	function update($id)
	{
		// set validation properties
		$this->_set_rules();
		
		// prefill form values
		$person = $this->lawyer_model->get_by_id($id)->row();
		@$this->form_data->id = $id;
		$this->form_data->name = $person->name;
		$this->form_data->address = $person->address;
		
		// set common properties
		$data['title'] = 'Update Family';
		$data['message'] = '';
		$data['action'] = site_url('users/family/updateFamily');
		$data['link_back'] = anchor('users/family/index/','Back to list of family',array('class'=>'back'));
	
		// load view
		$this->load->view('family/familyEdit', $data);
	}

	
}