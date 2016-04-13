<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doctor extends CI_Controller {

	// num of records per page
	//private $limit = 10;
	
	function __construct()
	{
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');		
		// load model
		$this->load->model('Doctor_model','',TRUE);
	}
	
	function index($offset = 0)
	{		
		$persons = $this->Doctor_model->get_paged_list()->result();
		$config['base_url'] = site_url('doctor/index/');// generate table data
		$this->load->library('table');
		    $tmpl = array ( 'table_open'  => 
'<table border="1" cellpadding="2" cellspacing="1" id="example1" class="table table-striped table-bordered">' );

    $this->table->set_template($tmpl);

		$this->table->set_heading('No', 'Name', 'Address', 'Actions');
		$i = 0 + $offset;
		foreach ($persons as $person)
		{
			$this->table->add_row(++$i, $person->name, $person->address,
				anchor('doctor/update/'.$person->id,'update',array('class'=>'update','data-toggle'=>'modal','data-target'=>'#myModal')).' '.
				anchor('doctor/delete/'.$person->id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this person?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('header', $data);
		$this->load->view('doctor/doctorList', $data);
		$this->load->view('footer', $data);
	}
	
	function add()
	{
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// set common properties
		$data['title'] = 'Add new Doctor';
		$data['message'] = '';
		$data['action'] = site_url('doctor/addPerson');
		$data['link_back'] = anchor('doctor/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('doctor/doctorEdit', $data);
	}
	
	function addPerson()
	{
		// set common properties
		$user_id = $this->session->userdata['is_userlogged_in']['user_id'];
		$data['title'] = 'Add new person';
		$data['action'] = site_url('doctor/addPerson');
		$data['link_back'] = anchor('doctor/index/','Back to list of persons',array('class'=>'back'));
		
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
			$doctor = array('name' => $this->input->post('name'),
				'address' => $this->input->post('address'));
							
			 $id = $this->Doctor_model->save($doctor);
			//exit;
			
			// set user message
			$data['message'] = '<div class="success">add new doctor success</div>';
		}
		
		// load view
		redirect('doctor/index', $data);
	}
	
	
	function update($id)
	{
		// set validation properties
		$this->_set_rules();
		
		// prefill form values
		$person = $this->Doctor_model->get_by_id($id)->row();
		@$this->form_data->id = $id;
		$this->form_data->name = $person->name;
		$this->form_data->address = $person->address;
		
		// set common properties
		$data['title'] = 'Update Doctor';
		$data['message'] = '';
		$data['action'] = site_url('doctor/updatePerson');
		$data['link_back'] = anchor('doctor/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('doctor/doctorEdit', $data);
	}
	
	function updatePerson()
	{
		// set common properties
		$user_id = $this->session->userdata['is_userlogged_in']['user_id'];
		$data['title'] = 'Update person';
		$data['action'] = site_url('doctor/updatePerson');
		$data['link_back'] = anchor('doctor/index/','Back to list of persons',array('class'=>'back'));
		
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
			$person = array('name' => $this->input->post('name'),
							'address' => $this->input->post('address')
							);
			$this->Doctor_model->update($id,$person);
			
			// set user message
			//$data['message'] = '<div class="success">update person success</div>';
		}
		
		// load view
		//$this->load->view('doctor/index', $data);
		redirect('doctor/index', $data);
	}
	
	function delete($id)
	{
		// delete person
		$this->Doctor_model->delete($id);
		
		// redirect to person list page
		redirect('doctor/index/','refresh');
	}
	
	// set empty default form field values
	function _set_fields()
	{
		@$this->form_data->id = '';
		@$this->form_data->name = '';
		@$this->form_data->address = '';
	}
	
	// validation rules
	function _set_rules()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}
	
}
?>