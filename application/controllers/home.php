<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ob_start();

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	function index(){
		$this->function_model->_makePages(
				'home-bd', 
				'Welcome', 
				'homepage'
		);
	}
	
	function post_tender(){
		$this->_makePages(
				'post-bd', 
				'Post a New Tender', 
				'post-tender'
		);
	}

	/*
	 * Send this link to those who wish to rest their user passwords
	 * */
	function resetpassword(){
		$this->load->view('resetpassword');
	}
	
	/* Update the database with actual data */
	function reset(){
		$username = $this->input->post('username');
		$passwd = $this->input->post('rpasswd');
		$cpasswd = $this->input->post('crpasswd');
		
		$this->form_validation->set_rules('username', 'Username/Email', 'required');
		$this->form_validation->set_rules('rpasswd', 'New Password', 'required|matches[crpasswd]');
		$this->form_validation->set_rules('crpasswd', 'Confirm Password', 'required');
		
		if($this->form_validation->run() == FALSE){
			$this->resetpassword();
		}
		else{
			$array = array('username'=>$username);
			
			$edit_array = array(
						'username' => $username,
						'rpasswd' => sha1($passwd)
					);
			
			$this->admin_model->editItems('users', $array, $edit_array);
		}
	}
}
