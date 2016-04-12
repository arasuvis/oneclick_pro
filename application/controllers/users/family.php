<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Family extends CI_Controller 
{
	public function Family() // Constructor
	{
		parent::__construct();
		$this->load->library(array('table','form_validation'));
			$this->load->model('family_model');
	}

	public function index($offset = 0)
	{	//echo "<pre>";
		//print_r($this->config);
		/*$tree = $this->config->item('jtree_url');
		$data['tree_url'] = $tree;
		$this->load->view('family/index',$data); */
	
		$family = $this->family_model->get_paged_list()->result();
		$config['base_url'] = site_url('family/index/');// generate table data
		$this->load->library('table');
		   $tmpl = array ( 'table_open'  => 
		'<table border="1" cellpadding="2" cellspacing="1" id="example1" class="table table-striped table-bordered">' );

    	$this->table->set_template($tmpl);

		//$this->table->set_heading('No', 'Name', 'Relationship', 'DOB', 'Marital Status','Status', 'Actions');
		$this->table->set_heading('No', 'Name', 'Relationship', 'DOB', 'Marital Status','Status','Actions');
		$i = 0 + $offset;
		foreach ($family as $fam)
		{
			$this->table->add_row(++$i, $fam->name, $fam->relationship, $fam->dob, $fam->marital_status, $fam->status,
			anchor('users/family/update/'.$fam->id,'update',array('class'=>'update','data-toggle'=>'modal','data-target'=>'#myModal')).' '.
			anchor('users/family/delete/'.$fam->id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this person?')"))
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


		$data['rel']=$this->family_model->get_relation()->result();
		// prefill form values
	
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
			//print_r($this->session->userdata['is_userlogged_in']['user_id']);
			//exit;
			$family = array('name' => $this->input->post('name'),
			'relationship'=>$this->input->post('relationship'),
			'dob'=>$this->input->post('dob'),
			'marital_status' => $this->input->post('marital_status'),
			'status' => $this->input->post('status'),
			'will_id' => $this->session->userdata['is_userlogged_in']['will_id']);
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
		$data['rel']=$this->family_model->get_relation()->result();
		// prefill form values
		$family = $this->family_model->get_by_id($id)->row();
		$data['families']= $family;  
		@$this->form_data->id = $id;
		$this->form_data->name = $family->name;
		$this->form_data->relationship = $family->relationship;
		$this->form_data->dob = $family->dob;
		$this->form_data->marital_status = $family->marital_status;
		$this->form_data->status = $family->status;
		//print_r($this->form_data;exit;

		// set common properties
		$data['title'] = 'Update Family';
		$data['message'] = '';
		$data['action'] = site_url('users/family/updateFamily');
		$data['link_back'] = anchor('users/family/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('family/familyEdit', $data);
	}

	function updateFamily()
	{

		// set common properties
		$data['title'] = 'Update family';
		$data['action'] = site_url('users/family/updateFamily');
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
			$id = $this->input->post('id');
			$family = array('name' => $this->input->post('name'),
							'relationship'=>$this->input->post('relationship'),
							'dob'=>$this->input->post('dob'),
							'marital_status' => $this->input->post('marital_status'),
							'status' => $this->input->post('status'));
							
			$this->family_model->update($id,$family);
			
			// set user message
			$data['message'] = '<div class="success">update family success</div>';
		}
		
		// load view
		//$this->load->view('family/familyEdit', $data);
		redirect('users/family/index', $data);
	}

	function delete($id)
	{
		// delete person
		$this->family_model->delete($id);
		
		// redirect to person list page
		redirect('users/family/index/','refresh');
	}
}