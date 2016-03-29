<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Family extends CI_Controller 
{
	public function Family() // Constructor
	{
		parent::__construct();
	}

	/**** Start Login ****/

	public function index()
	{	//echo "<pre>";
		//print_r($this->config);
		$tree = $this->config->item('jtree_url');
		$data['tree_url'] = $tree;
		$this->load->view('family/index',$data);
	}
}