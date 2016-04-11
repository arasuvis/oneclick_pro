<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grantprop extends CI_Controller {

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
		$this->load->model('Prop_model','',TRUE);
	}
	
	function index($offset = 0)
	{		
		$persons = $this->Prop_model->get_paged_list()->result();
		$config['base_url'] = site_url('grantprop/index/');// generate table data
		$this->load->library('table');
		    $tmpl = array ( 'table_open'  => 
'<table border="1" cellpadding="2" cellspacing="1" id="example1" class="table table-striped table-bordered">' );

    $this->table->set_template($tmpl);

		$this->table->set_heading('No', 'Propertyname', 'Relation', 'Percentage(%)','Action');
		$i = 0 + $offset;
		foreach ($persons as $person)
		{
			$this->table->add_row(++$i, $person->name, $person->firstname, $person->percent,
				//anchor('grantprop/update/'.$person->grant_im_id,'update',array('class'=>'update','data-toggle'=>'modal','data-target'=>'#myModal')).' '.
				anchor('grantprop/update/'.$person->grant_im_id,'update',array('class'=>'update')).' '.
				anchor('grantprop/delete/'.$person->grant_im_id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this person?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('header', $data);
		$this->load->view('grantprop/propList', $data);
		$this->load->view('footer', $data);
	}
	
	function add()
	{
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		$data['get_family_members'] = $this->Prop_model->get_family_members()->result();
		$data['get_im_property'] = $this->Prop_model->get_im_property()->result();
		
		// set common properties
		$data['title'] = 'Property Allocation';
		$data['message'] = '';
		$data['action'] = site_url('grantprop/addPerson');
		$data['link_back'] = anchor('grantprop/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('grantprop/propEdit', $data);
	}
	
	function addPerson()
	{
		// set common properties
		$data['title'] = 'Property Allocation';
		$data['action'] = site_url('grantprop/addPerson');
		$data['link_back'] = anchor('grantprop/index/','Back to list of persons',array('class'=>'back'));
		
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
			$prop = array(
			'property_id' => $this->input->post('properties'),
			'fam_id' => $this->input->post('fam_member'),
			'user_id' => 3,
			'percent' => $this->input->post('percent'));
			 $id = $this->Prop_model->save($prop);
		
			// set user message
			$data['message'] = '<div class="success">add new property success</div>';
		}
		
		// load view
		redirect('grantprop/index', $data);
	}
	
	
	function update($id)
	{
		// set validation properties
		$this->_set_rules();
		
		// prefill form values
		$person = $this->Prop_model->get_by_id($id)->row();
		@$this->form_data->id = $grant_im_id;
		$this->form_data->property_id = $person->property_id;
		$this->form_data->percent = $person->percent;
		$this->form_data->fam_id = $person->fam_id;
		$data['get_family_members'] = $this->Prop_model->get_family_members()->result();
		$data['get_im_property'] = $this->Prop_model->get_im_property()->result();
		// set common properties
		$data['title'] = 'Update Doctor';
		$data['message'] = '';
		$data['action'] = site_url('grantprop/updatePerson');
		$data['link_back'] = anchor('grantprop/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('grantprop/propEdit', $data);
	}
	
	function updatePerson()
	{
		// set common properties
		$data['title'] = 'Update person';
		$data['action'] = site_url('grantprop/updatePerson');
		$data['link_back'] = anchor('grantprop/index/','Back to list of persons',array('class'=>'back'));
		
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
			$id = $this->input->post('grant_im_id');
			$person = array('property_id' => $this->input->post('property_id'),
							'fam_id' => $this->input->post('fam_id'),
							'user_id' => 3,
							'percent' => $this->input->post('percent'),);
			$this->Prop_model->update($id,$person);
			
			// set user message
			//$data['message'] = '<div class="success">update person success</div>';
		}
		
		// load view
		//$this->load->view('grantprop/index', $data);
		redirect('grantprop/index', $data);
	}
	
	function delete($id)
	{
		// delete person
		$this->Prop_model->delete($id);
		
		// redirect to person list page
		redirect('grantprop/index/','refresh');
	}
	
	// set empty default form field values
	function _set_fields()
	{
		@$this->form_data->property_id = '';
		@$this->form_data->user_id = '';
		@$this->form_data->fam_id = '';
		@$this->form_data->percent = '';
	}
	
	// validation rules
	function _set_rules()
	{
		$this->form_validation->set_rules('percent', 'Percent', 'trim|required');
		//$this->form_validation->set_rules('address', 'Address', 'trim|required');
		
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}
	
}
?>