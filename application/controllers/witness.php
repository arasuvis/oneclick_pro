<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Witness extends CI_Controller 
{	
	function __construct()
	{
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation'));
		// load helper
		$this->load->helper('url');		
		// load model
		$this->load->model('witness_model','',TRUE);
	}
	
	/**** Start Immovable witness ****/

	function index($offset = 0)
	{
		$persons = $this->witness_model->get_paged_list()->result();
		
		//echo "<pre>";print_r($persons);die();
		
		$config['base_url'] = site_url('witness/index');// generate table data
		$this->load->library('table');
		
		$tmpl = array(
		'table_open'=>'<table border="1" cellpadding="2" cellspacing="1" id="example1" class="table 
		table-striped table-bordered">'
		);

    	$this->table->set_template($tmpl);

		$this->table->set_heading('No','Name','Address','Actions');
		
		$i = 0 + $offset;
		foreach ($persons as $person)
		{
			$this->table->add_row(++$i, $person->name, $person->address,
			anchor('witness/update/'.$person->witness_id,'update',array('class'=>'update',
			'data-toggle'=>'modal','data-target'=>'#myModal')).' '.
			anchor('witness/delete/'.$person->witness_id,'delete',array('class'=>'delete',
			'onclick'=>"return confirm('Are you sure want to delete this?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('header', $data);
		$this->load->view('witness/witnessList', $data);
		$this->load->view('footer', $data);
	}
	
	function add()
	{
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// set common properties
		$data['title'] = 'Add new witness';
		$data['message'] = '';
		$data['action'] = site_url('witness/addwitness');
		$data['link_back'] = anchor('witness/index/','Back to list',array('class'=>'back'));
	
		// load view
		$this->load->view('witness/witnessEdit', $data);
	}
	
	function addwitness()
	{
		// set common properties
		
		$data['title'] = 'Add new person';
		$data['action'] = site_url('witness/addwitness');
		$data['link_back'] = anchor('witness/index/','Back to list',array('class'=>'back'));
		
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
			$witness = array('name' => $this->input->post('name'),
			
			'address' => $this->input->post('address'),
			'created_date' => date("Y-m-d H:i:s"),
			'modified_date' => date("Y-m-d H:i:s"),
			);
			
			//echo "<pre>";print_r($witness);die();

			$id = $this->witness_model->save($witness);
			
			// set user message
			$data['message'] = '<div class="success">add new witness success</div>';
		}
		
		// load view
		redirect('witness/index', $data);
	}
	
	
	function update($id)
	{
		// set validation properties
		$this->_set_rules();
		
		// prefill form values
		$person = $this->witness_model->get_by_id($id)->row();
		@$this->form_data->id = $id;
		$this->form_data->name = $person->name;
		$this->form_data->address = $person->address;
		
		// set common properties
		$data['title'] = 'Update witness';
		$data['message'] = '';
		$data['action'] = site_url('witness/updatePerson');
		$data['link_back'] = anchor('witness/index/','Back to list',array('class'=>'back'));
	
		// load view
		$this->load->view('witness/witnessEdit', $data);
	}
	
	function updatePerson()
	{
		// set common properties
		$data['title'] = 'Update person';
		$data['action'] = site_url('witness/updatePerson');
		$data['link_back'] = anchor('witness/index/','Back to list',array('class'=>'back'));
		
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
							'address' => $this->input->post('address'),
							);
			$this->witness_model->update($id,$person);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
		}
		
		// load view
		redirect('witness/index', $data);
	}
	
	function delete($id)
	{
		// delete person
		$this->witness_model->delete($id);
		
		// redirect to person list page
		redirect('witness/index/');
	}
	
	// set empty default form field values
	function _set_fields()
	{
		@$this->form_data->id = '';
		@$this->form_data->name = '';
		@$this->form_data->address = '';
		@$this->form_data->municipal_number = '';
		@$this->form_data->year_of_purchase = '';
		@$this->form_data->area = '';
		@$this->form_data->nature_of_ownership = '';
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

	/**** End witness ****/

}
?>