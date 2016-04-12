<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Property extends CI_Controller 
{	
	function __construct()
	{
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation'));
		// load helper
		$this->load->helper('url');		
		// load model
		$this->load->model('property_model','',TRUE);
		$this->load->model('admin/property_type_model');
		$this->load->model('admin/ownership_model');

	}
	
	/**** Start Immovable Property ****/

	function index($offset = 0)
	{

		$persons = $this->property_model->get_paged_list()->result();
		
		$config['base_url'] = site_url('property/index');// generate table data
		$this->load->library('table');
		
		$tmpl = array(
		'table_open'=>'<table border="1" cellpadding="2" cellspacing="1" id="example1" class="table 
		table-striped table-bordered">'
		);

    	$this->table->set_template($tmpl);

		$this->table->set_heading('No','Name','Address','Municipal Number','Year Of Purchase','Area','Nature Of Ownership','Actions');
		
		$i = 0 + $offset;
		foreach ($persons as $person)
		{
			//echo "<pre>"; print_r($person);
			$this->table->add_row(++$i, $person->name, $person->address,$person->municipal_number,
			$person->year_of_purchase,$person->area,$person->ownership,
			anchor('property/update/'.$person->Immovable_id,'update',array('class'=>'update',
			'data-toggle'=>'modal','data-target'=>'#myModal')).' '.
			anchor('property/delete/'.$person->Immovable_id,'delete',array('class'=>'delete',
			'onclick'=>"return confirm('Are you sure want to delete this?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('header', $data);
		$this->load->view('property/propertyList', $data);
		$this->load->view('footer', $data);
	}
	
	function add()
	{
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		$data['property_type'] = $this->property_type_model->get_all_property();
		$data['ownership'] = $this->ownership_model->get_all_ownership();
		// set common properties
		$data['title'] = 'Add new property';
		$data['message'] = '';
		$data['action'] = site_url('property/addproperty');
		$data['link_back'] = anchor('property/index/','Back to list',array('class'=>'back'));
	
		// load view
		$this->load->view('property/propertyEdit', $data);
	}
	
	function addproperty()
	{
		// set common properties
		$user_id = $this->session->userdata['is_userlogged_in']['user_id'];

		$data['title'] = 'Add new person';
		$data['action'] = site_url('property/addproperty');
		$data['link_back'] = anchor('property/index/','Back to list',array('class'=>'back'));
		
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
			$property = array('name' => $this->input->post('name'),
			'user_id' => $user_id,
			'address' => $this->input->post('address'),
			'municipal_number' => $this->input->post('municipal_number'),
			'year_of_purchase' => $this->input->post('year_of_purchase'),
			'area' => $this->input->post('area'),
			'nature_of_ownership' => $this->input->post('nature_of_ownership'),
			'created_date' => date("Y-m-d H:i:s"),
			'modified_date' => date("Y-m-d H:i:s"),
			);

			$id = $this->property_model->save($property);
			
			// set user message
			$data['message'] = '<div class="success">add new property success</div>';
		}
		
		// load view
		redirect('property/index', $data);
	}
	
	
	function update($id)
	{
		// set validation properties
		$this->_set_rules();
		
		// prefill form values
		$person = $this->property_model->get_by_id($id)->row();
		@$this->form_data->id = $id;
		$this->form_data->name = $person->name;
		$this->form_data->address = $person->address;
		@$this->form_data->municipal_number = $person->municipal_number;
		@$this->form_data->year_of_purchase = $person->year_of_purchase;
		$this->form_data->area = $person->area;
		$this->form_data->nature_of_ownership = $person->nature_of_ownership;
		$data['person'] = $person;
		$data['property_type'] = $this->property_type_model->get_all_property();
		$data['ownership'] = $this->ownership_model->get_all_ownership();
		// set common properties
		$data['title'] = 'Update property';
		$data['message'] = '';
		$data['action'] = site_url('property/updatePerson');
		$data['link_back'] = anchor('property/index/','Back to list',array('class'=>'back'));
	
		// load view
		$this->load->view('property/propertyEdit', $data);
	}
	
	function updatePerson()
	{
		// set common properties
		$user_id = $this->session->userdata['is_userlogged_in']['user_id'];

		$data['title'] = 'Update person';
		$data['action'] = site_url('property/updatePerson');
		$data['link_back'] = anchor('property/index/','Back to list',array('class'=>'back'));
		
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
							'municipal_number' => $this->input->post('municipal_number'),
							'year_of_purchase' => $this->input->post('year_of_purchase'),
							'area' => $this->input->post('area'),
							'nature_of_ownership' => $this->input->post('nature_of_ownership'),
							'user_id' => $user_id);
			$this->property_model->update($id,$person);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
		}
		
		// load view
		redirect('property/index', $data);
	}
	
	function delete($id)
	{
		// delete person
		$this->property_model->delete($id);
		
		// redirect to person list page
		redirect('property/index/');
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
		$this->form_validation->set_rules('municipal_number', 'Municipal Number', 'trim|required');
		$this->form_validation->set_rules('year_of_purchase', 'Year of Purchase', 'trim|required');
		$this->form_validation->set_rules('area', 'Area', 'trim|required');
		$this->form_validation->set_rules('nature_of_ownership', 'nature_of_ownership', 'trim|required
		');

		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}

	/**** End Immovable Property ****/

	/**** Start movable Property ****/

	function index2($offset = 0)
	{
		$mov_prop = $this->property_model->get_paged_list2()->result();
		
		//echo "<pre>";print_r($persons);die();
		
		$config['base_url'] = site_url('property/index2');// generate table data
		$this->load->library('table');
		
		$tmp2 = array(
		'table_open'=>'<table border="1" cellpadding="2" cellspacing="1" id="example1" class="table 
		table-striped table-bordered">'
		);

    	$this->table->set_template($tmp2);

		$this->table->set_heading('No','Name','Comments','Actions');
		
		$i = 0 + $offset;
		foreach ($mov_prop as $person)
		{
			$this->table->add_row(++$i, $person->name, $person->comments,
			anchor('property/update2/'.$person->movable_id,'update',array('class'=>'update',
			'data-toggle'=>'modal','data-target'=>'#myModal')).' '.
			anchor('property/delete2/'.$person->movable_id,'delete',array('class'=>'delete',
			'onclick'=>"return confirm('Are you sure want to delete this?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('header', $data);
		$this->load->view('property/propertyList2', $data);
		$this->load->view('footer', $data);
	}
	
	function add2()
	{
		// set empty default form field values
		$this->_set_fields2();
		// set validation properties
		$this->_set_rules2();
		
		// set common properties
		$data['title'] = 'Add';
		$data['message'] = '';
		$data['action'] = site_url('property/addproperty2');
		$data['link_back'] = anchor('property/index2/','Back to list',array('class'=>'back'));
	
		// load view
		$this->load->view('property/propertyEdit2', $data);
	}
	
	function addproperty2()
	{
		// set common properties
		$user_id = $this->session->userdata['is_userlogged_in']['user_id'];
		$data['title'] = 'Add new person';
		$data['action'] = site_url('property/addproperty2');
		$data['link_back'] = anchor('property/index2/','Back to list of persons',array('class'=>'back'));
		
		// set empty default form field values
		$this->_set_fields2();
		// set validation properties
		$this->_set_rules2();
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['message'] = '';
		}
		else
		{
			// save data
			$mov_property = array('name' => $this->input->post('name'),
			'user_id' => $user_id,
			'comments' => $this->input->post('comments'),
			'created_date' => date("Y-m-d H:i:s"),
			'modified_date' => date("Y-m-d H:i:s"),
			);
			
			//echo "<pre>";print_r($mov_property);die();

			$id = $this->property_model->save2($mov_property);
			
			// set user message
			$data['message'] = '<div class="success">add new property success</div>';
		}
		
		// load view
		redirect('property/index2', $data);
	}
	
	
	function update2($id)
	{
		// set validation properties
		$this->_set_rules2();
		
		// prefill form values
		$person = $this->property_model->get_by_id2($id)->row();
		@$this->form_data->id = $id;
		$this->form_data->name = $person->name;
		$this->form_data->comments = $person->comments;
		
		// set common properties
		$data['title'] = 'Update property';
		$data['message'] = '';
		$data['action'] = site_url('property/updatePerson2');
		$data['link_back'] = anchor('property/index2/','Back to list',array('class'=>'back'));
	
		// load view
		$this->load->view('property/propertyEdit2', $data);
	}
	
	function updatePerson2()
	{
		// set common properties
		$user_id = $this->session->userdata['is_userlogged_in']['user_id'];
		$data['title'] = 'Update person';
		$data['action'] = site_url('property/updatePerson2');
		$data['link_back'] = anchor('property/index2/','Back to list',array('class'=>'back'));
		
		// set empty default form field values
		$this->_set_fields2();
		// set validation properties
		$this->_set_rules2();
		
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
							'comments' => $this->input->post('comments'),
							'user_id' => $user_id);
			$this->property_model->update2($id,$person);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
		}
		
		// load view
		redirect('property/index2', $data);
	}
	
	function delete2($id)
	{
		// delete person
		$this->property_model->delete2($id);
		
		// redirect to person list page
		redirect('property/index2/');
	}
	
	// set empty default form field values
	function _set_fields2()
	{
		@$this->form_data->id = '';
		@$this->form_data->name = '';
		@$this->form_data->comments = '';
	}
	
	// validation rules
	function _set_rules2()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('comments', 'Comments', 'trim|required');

		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}

	/**** End Movable Property ****/

	/*** Start Not Allocated Property ***/

	function index3($offset = 0)
	{
		$not_prop = $this->property_model->get_paged_list3()->result();
		
		$config['base_url'] = site_url('property/index3');// generate table data
		$this->load->library('table');
		
		$tmp3 = array(
		'table_open'=>'<table border="1" cellpadding="2" cellspacing="1" id="example1" class="table 
		table-striped table-bordered">'
		);

    	$this->table->set_template($tmp3);

		$this->table->set_heading('No','Membor Name','Reason','Actions');
		
		$i = 0 + $offset;
		foreach ($not_prop as $person)
		{

			$member_name = $this->property_model->get_member_name($person->member_id);

			$this->table->add_row(++$i, $member_name[0]->firstname, $person->reason,
			anchor('property/update3/'.$person->id,'update',array('class'=>'update',
			'data-toggle'=>'modal','data-target'=>'#myModal')).' '.
			anchor('property/delete3/'.$person->id,'delete',array('class'=>'delete',
			'onclick'=>"return confirm('Are you sure want to delete this?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('header', $data);
		$this->load->view('property/propertyList3', $data);
		$this->load->view('footer', $data);
	}
	
	function add3()
	{
		// set empty default form field values
		$this->_set_fields3();
		// set validation properties
		$this->_set_rules3();
		
		$data['get_family_member'] = $this->property_model->get_family_member();

		// set common properties
		$data['title'] = 'Add Member';
		$data['message'] = '';
		$data['action'] = site_url('property/addproperty3');
		$data['link_back'] = anchor('property/index3/','Back to list',array('class'=>'back'));
	
		// load view
		$this->load->view('property/propertyEdit3', $data);
	}
	
	function addproperty3()
	{
		// set common properties
		$user_id = $this->session->userdata['is_userlogged_in']['user_id'];
		$data['title'] = 'Add new person';
		$data['action'] = site_url('property/addproperty3');
		$data['link_back'] = anchor('property/index3/','Back to list of persons',array('class'=>'back'));
		
		// set empty default form field values
		$this->_set_fields3();
		// set validation properties
		$this->_set_rules3();
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['message'] = '';
		}
		else
		{
			// save data
			$not_property = array(
			'user_id' => $user_id,
			'member_id' => $this->input->post('member_id'),
			'reason' => $this->input->post('reason'),
			'created_date' => date("Y-m-d H:i:s"),
			'modified_date' => date("Y-m-d H:i:s"),
			);

			$id = $this->property_model->save3($not_property);
			
			// set user message
			$data['message'] = '<div class="success">add new property success</div>';
		}
		
		// load view
		redirect('property/index3', $data);
	}
	
	
	function update3($id)
	{
		// set validation properties
		$this->_set_rules3();
		
		// prefill form values
		$person = $this->property_model->get_by_id3($id)->row();

		$data['get_family_member'] = $this->property_model->get_family_member();

		@$this->form_data->id = $id;
		$this->form_data->member_id = $person->member_id;
		$this->form_data->reason = $person->reason;
		
		// set common properties
		$data['title'] = 'Update property';
		$data['message'] = '';
		$data['action'] = site_url('property/updatePerson3');
		$data['link_back'] = anchor('property/index3/','Back to list',array('class'=>'back'));
	
		// load view
		$this->load->view('property/propertyEdit3', $data);
	}
	
	function updatePerson3()
	{
		// set common properties
		$user_id = $this->session->userdata['is_userlogged_in']['user_id'];
		$data['title'] = 'Update person';
		$data['action'] = site_url('property/updatePerson3');
		$data['link_back'] = anchor('property/index3/','Back to list',array('class'=>'back'));
		
		// set empty default form field values
		$this->_set_fields3();
		// set validation properties
		$this->_set_rules3();
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['message'] = '';
		}
		else
		{
			// save data
			$id = $this->input->post('id');
			$person = array('reason' => $this->input->post('reason'),
							'user_id' => $user_id,
							'member_id' => $this->input->post('member_id'));
			$this->property_model->update3($id,$person);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
		}
		
		// load view
		redirect('property/index3', $data);
	}
	
	function delete3($id)
	{
		// delete person
		$this->property_model->delete3($id);
		
		// redirect to person list page
		redirect('property/index3/');
	}
	
	// set empty default form field values
	function _set_fields3()
	{
		@$this->form_data->id = '';
		@$this->form_data->member_id = '';
		@$this->form_data->reason = '';
	}
	
	// validation rules
	function _set_rules3()
	{
		//$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('reason', 'reason', 'trim|required');

		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}

	/*** End Not Allocated Property ***/

}
?>