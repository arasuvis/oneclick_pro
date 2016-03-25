<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Property extends CI_Controller 
{
	public function Property() // Constructor
	{
		parent::__construct();
	}

	/**** Start Login ****/

	public function index()
	{
		$this->load->view('welcome_message');
	}
}