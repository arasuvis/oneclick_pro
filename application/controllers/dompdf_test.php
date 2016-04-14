<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dompdf_test extends CI_Controller {

	/**
	 * Example: DOMPDF 
	 *
	 * Documentation: 
	 * http://code.google.com/p/dompdf/wiki/Usage
	 *
	 */
	 function __construct()
	{
		parent::__construct();
		
		// Load library
		$this->load->library('dompdf_gen');
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');		
		// load model
		$this->load->model('will_model','',TRUE);
	}
	
	public function index() {	
		// Load all views as normal
		$user_id = 1;
		$data['id'] = $this->will_model->get_will_details($user_id);
		$this->load->view('pdf_view',$data);
		// Get output html
		$html = $this->output->get_output();
		
		
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
	//	$this->dompdf->stream("welcome.pdf");
		
	}
}
