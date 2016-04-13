<?php 

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_model');
		$this->load->library('table');
	}

	function index()
	{
		$will = $this->user_model->get_will()->result();
		$config['base_url'] = site_url('home/index/');
		$tmpl = array ( 'table_open'  => 
		'<table border="1" cellpadding="2" cellspacing="1" id="example1" class="table table-striped table-bordered">' );
		$this->table->set_template($tmpl);
		$this->table->set_heading('No', 'Name','Action');
		$i = 0;
		foreach ($will as $w)
		{
			$this->table->add_row(++$i, 
			anchor('users/family/index/'.$w->will_id,$w->will_name),
			anchor('home/update/'.$w->will_id,'update',array('class'=>'update','data-toggle'=>'modal','data-target'=>'#myModal')).' '.
				anchor('home/delete/'.$w->will_id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this person?')"))
				);
		}
		$data['table'] = $this->table->generate();
		$this->load->view('header');
		$this->load->view('user_page',$data);
		$this->load->view('footer');
		

		//$this->load->view('user_page');
	}
}

?>