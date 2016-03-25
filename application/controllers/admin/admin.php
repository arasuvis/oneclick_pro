<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function Admin() // Constructor
	{
		parent::__construct();
	}

	/**** Start Login ****/

	public function index()
	{
		$this->load->view('welcome_message');
	}
}