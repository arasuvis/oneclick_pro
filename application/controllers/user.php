<?php 

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->model('user_model');
	}

	function index()
	{	
		if (isset($this->session->userdata['is_userlogged_in'])) 
		{
			redirect(base_url('user/dashboard'));
		}
		$this->load->view('header_home');
		$this->load->view('navbar_home');
		$this->load->view('index_home');
		$this->load->view('footer_home');
	}
	

	function register()
	{
		$this->load->view('registration');
	}

	function reg_details()
	{
		$this->form_validation->set_rules('fname','First Name','trim|required|alpha');
		$this->form_validation->set_rules('mname','Middle Name','trim|required');
		$this->form_validation->set_rules('surname','Surname','trim|required');
		$this->form_validation->set_rules('email','Email Id','trim|required|valid_email|is_unique[user_register.email]');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('age','Age','trim|required|integer');
		$this->form_validation->set_rules('gender','Gender','trim|required|alpha');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('mobile','Mobile Number','trim|required|exact_length[10]|integer');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() == False)
		{
			echo "error"; 
			$this->load->view('registration');
		}
		else
		{

		$data = array(
			'fname' => $this->input->post('fname'),
			'mname' => $this->input->post('mname'),
			'surname' => $this->input->post('surname'),
			'email' => $this->input->post('email'),
			'password' =>md5($this->input->post('password')),
			'age' => $this->input->post('age'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address'),
			'mobile' => $this->input->post('mobile')
						);
		
		$id = $this->user_model->save_reg($data);
		
		if($id)
		{
			if($this->user_model->reg_will_id($id))
			{
			$this->load->view('header_home');
			$this->load->view('navbar_home');
			$this->load->view('index_home'); 
			$this->load->view('footer_home');
			 }
			else
			{
				$this->load->view('registration');	
			}
		}
		else
		{
			$this->load->view('registration');
		}
	}
	}

	function login()
	{
		$this->load->view('login_view');
	}

	function dashboard()
	{
		//print_r($this->session->userdata['is_userlogged_in']); die();
		if (isset($this->session->userdata['is_userlogged_in'])) 
		{
			$this->load->library('../controllers/home');
			$obj = new $this->home();
			$obj->index();
		}
		else
		{
			redirect($this->index());
		}

	}
	
	function credentials()
	{

		$this->form_validation->set_rules('email','Email Id','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');
				
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() == False)
		{
			$this->load->view('homepage');
		}
		else
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$this->load->model('user_model');
						
			$log_id = $this->user_model->login_valid($email,$password);

			if(!empty($log_id))
			{

				$session_data = $this->session->userdata('is_userlogged_in');
				$will_id=$this->user_model->get_will_id($log_id);

				$session_data['user_id'] = $log_id;
				$session_data['will_id'] = $will_id;

				$this->session->set_userdata("is_userlogged_in", $session_data);
				
				//$data = array(
				//'email' => $email,	
				//'is_userlogged_in' = $log_id;
				//$this->session->set_userdata('is_userlogged_in', $log_id);
				$this->dashboard();
			}
			else if($log_id == false)
			{
				$msg['error'] = "Username or Password is Invalid";
				$this->load->view('homepage',$msg);
			}
		}
	}

	function logout()
	{
		$sess_array = array(
		'email' => ''
		);
		$this->session->unset_userdata('is_userlogged_in', $sess_array);
		redirect('user');	
	}


	function forgot()
	{
		
		$this->load->view('forget_view');
	}

	function reset_pass_email()
	{
		$email = $this->input->post('email');

		if($this->user_model->forgot_pass($email))
		{
			$message = base_url()."user/reset_pass?email=".$email.'&ui='.md5(uniqid());
			$this->email->from('admin@oneclick.com', 'One Click');
			$this->email->to($email); 	
			$this->email->subject('Password reset');
			$this->email->message('You have requested the new password '.$message);	
			$this->email->send();
			echo $this->email->print_debugger();
		}
		else
		{
			echo "The email id you entered not found";
			$this->load->view('forget_view');
		}
	}

	function reset_pass()
	{
		$email['em'] = $_GET['email'];
		$this->load->view('reset_pass_view',$email);
	}

	function reset_new_pass()
	{
		$email = $this->input->post('email');
		$pass = md5($this->input->post('password'));
		$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() == False)
		{
			$this->load->view('reset_pass_view');
		}
		else
		{
			$this->load->model('user_model');
			if($this->user_model->resetpassword($pass,$email))
			{
				$this->email->from('admin@oneclick.com', 'One Click');
				$this->email->to($email); 	
				$this->email->subject('Password reset');
				$this->email->message('Your Password has been successfully changed');	
				$this->email->send();
				echo $this->email->print_debugger();
			}
			else
			{
				echo "password not changed";
			}
		}
	}

	function change_pass()
	{
		$this->load->view('change_pass_view');
	}

	function new_pass()
	{
		$this->form_validation->set_rules('confirm_new_password','Confirm New Password','trim|required|matches[new_password]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() == False)
		{
			$this->load->view('change_pass_view');
		}
		else
		{
			$pass = md5($this->input->post('password'));
			$newpass = md5($this->input->post('new_password'));
					
			if($this->user_model->current($pass))
			{
				if($this->user_model->change_pass($newpass))
				{
					$this->load->view('user_page');
					echo "sucessfully changed";
				}
				else
				{
					echo "password not changed";
					$this->load->view('change_pass_view');
				}
			}
			else
			{
				echo "current password is in valid";
				$this->load->view('change_pass_view');
			}
		}
	}
}