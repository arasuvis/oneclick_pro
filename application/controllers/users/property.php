<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Property extends CI_Controller 
{
	

	public function Property() // Constructor
	{
		parent::__construct();
		$this->load->library(array('table','form_validation'));
		$this->load->model(array('property_model'));
	}

	/**** Immovable Property(Itemized view) ****/

	public function index()
	{
		$this->load->view('user/immovable_property');
	}

	public function add_immov_property()
	{
		$data = array(
		//'user_id' => $_POST['user_id'],
		'user_id' => 3,
		'name' => $_POST['name'],
		'address' => $_POST['address'],
		'municipal_number' => $_POST['municipal_number'],
		'year_of_purchase' => $_POST['year_of_purchase'],
		'area' => $_POST['area'],
		'nature_of_ownership' => $_POST['nature_of_ownership'],
		'created_date' => date("Y-m-d H:i:s"),
		'modified_date'=> date("Y-m-d H:i:s")
		);

		
		$result = $this->property_model->insert_immov_property($data);
		if($result == true)
		{
			redirect('display_immov');
		}
	}


	public function add()
	{
		// set empty default form field values
		//$this->_set_fields();
		// set validation properties
	//	$this->_set_rules();
		
		// set common properties
		$data['title'] = 'Add Property';
		$data['message'] = '';
		//$data['action'] = base_url('property/addproperty');
		//$data['link_back'] = anchor('property/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('user/immovable_property', $data);
	}

	public function display_immov_prop($offset = 0)
	{
		$this->load->library('table');
		
		$tmpl = array ( 
		'table_open' => '<table border="1" cellpadding="2" cellspacing="1" id="example1" 
		class="table table-striped table-bordered">' );
		
		$this->table->set_template($tmpl);

		
		$data['imv_prop'] = $this->property_model->get_immov_prop_details();

		$this->table->set_heading(
		'No', 'Name', 'Address', 'Municipal Number', 'Year Of Purchase', 
		'Area','Nature Of Ownership', 'Actions');
		$i = 0 + $offset;
		foreach ($data['imv_prop'] as $person)
		{
			$this->table->add_row(++$i, $person->name, $person->address, $person->municipal_number, 
				$person->year_of_purchase, $person->area, $person->nature_of_ownership,
				//anchor('person/view/'.$person->Immovable_id,'view',array('class'=>'view','data-toggle'=>'modal','data-target'=>'#myModal')).' '.
				anchor('property_update/'.$person->Immovable_id,'update',array('class'=>'update')).' '.
				anchor('person/delete/'.$person->Immovable_id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this person?')"))
			);
		}
		$data['table'] = $this->table->generate();

		$this->load->view('user/display_immovable_property',$data);
	}

	/**** End Immovable Property ****/

	/**** Movable Property(Itemized view) ****/

	public function movable_form()
	{
		$this->load->view('user/movable_property');
	}

	public function add_movable_property()
	{
		$data = array(
		'name' => $_POST['name'],
		'comments' => $_POST['comments'],
		'created_date' => date("Y-m-d H:i:s"),
		'modified_date'=> date("Y-m-d H:i:s")
		);

		
		$result = $this->property_model->insert_mov_property($data);
		if($result == true)
		{
			redirect('display_mov');
		}
		
	}

	public function display_mov_prop()
	{

		
		$data['mov_prop'] = $this->property_model->get_mov_prop_details();
		$this->load->view('user/display_movable_property',$data);
	}

	/**** End Movable Property ****/

	/**** Immovable Property(dropdown) ****/

	public function get_all_property_details()
	{
		
		$data['property'] = $this->property_model->get_all_property();
		$data['family'] = $this->property_model->get_family_members();		
		$this->load->view('user/property_allocation',$data);
	}

	/**** End Immovable Property ****/
	
	public function update($id)
	{
		echo $id;
		// set validation properties
		//$this->_set_rules();
		
		// prefill form values
		$property = $this->property_model->get_by_id($id)->row();
		echo "<pre>";
		print_r($person);
		exit;

)
		@$this->form_data->Immovable_id = $id;
		$this->form_data->user_id = $property->user_id;
		$this->form_data->name = $property->name;
		$this->form_data->address = $property->address;
		$this->form_data->municipal_number = $property->municipal_number;
		$this->form_data->year_of_purchase = $property->year_of_purchase;
		$this->form_data->area = $property->area;
		$this->form_data->nature_of_ownership = $property->nature_of_ownership;
		$this->form_data->created_date = date('d-m-Y',strtotime($person->created_date));
		
		// set common properties
		$data['title'] = 'Update Property';
		$data['message'] = '';
		//$data['action'] = site_url('property/updatePerson');
//$data['link_back'] = anchor('person/index/','Back to list of persons',array('class'=>'back'));
	
		// load view
		$this->load->view('witness/personEdit', $data);
	}
	
	public function updatePerson()
	{
		// set common properties
		$data['title'] = 'Update person';
		$data['action'] = site_url('person/updatePerson');
		$data['link_back'] = anchor('person/index/','Back to list of persons',array('class'=>'back'));
		
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
							'gender' => $this->input->post('gender'),
							'dob' => date('Y-m-d', strtotime($this->input->post('dob'))));
			$this->Person_model->update($id,$person);
			
			// set user message
			$data['message'] = '<div class="success">update person success</div>';
		}
		
		// load view
		$this->load->view('witness/personEdit', $data);
	}
	
	
}