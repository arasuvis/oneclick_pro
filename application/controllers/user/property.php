<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Property extends CI_Controller 
{
	public function Property() // Constructor
	{
		parent::__construct();
	}

	/**** Immovable Property ****/

	public function index()
	{
		$this->load->view('user/immovable_property');
	}

	public function add_immov_property()
	{
		$data = array(
		'name' => $_POST['name'],
		'address' => $_POST['address'],
		'municipal_number' => $_POST['municipal_number'],
		'year_of_purchase' => $_POST['year_of_purchase'],
		'area' => $_POST['area'],
		'nature_of_ownership' => $_POST['nature_of_ownership'],
		'created_date' => date("Y-m-d H:i:s"),
		'modified_date'=> date("Y-m-d H:i:s")
		);

		$this->load->model('property_model');
		$result = $this->property_model->insert_immov_property($data);
		if($result == true)
		{
			redirect('display_immov');
		}
	}

	public function display_immov_prop()
	{
		$this->load->model('property_model');
		$data['imv_prop'] = $this->property_model->get_immov_prop_details();
		$this->load->view('user/display_immovable_property',$data);
	}

	/**** End Immovable Property ****/

	/**** Movable Property ****/

	public function add_movable_property()
	{
		$data = array(
		'name' => $_POST['name'],
		'comments' => $_POST['comments'],
		'created_date' => date("Y-m-d H:i:s"),
		'modified_date'=> date("Y-m-d H:i:s")
		);

		$this->load->model('property_model');
		$result = $this->property_model->insert_mov_property($data);
		if($result == true)
		{
			redirect('display_mov');
		}
		$this->load->view('user/movable_property');
	}

	public function display_mov_prop()
	{
		$this->load->model('property_model');
		$data['mov_prop'] = $this->property_model->get_mov_prop_details();
		$this->load->view('user/display_movable_property',$data);
	}

	/**** End Movable Property ****/
}