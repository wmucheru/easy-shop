<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ob_start();

class Contact extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	function index(){
		$this->function_model->_makePages(
				'cont-bd', 
				'Contact Us', 
				'contact'
		);
	}
	
	//Send email from contact form
	function send(){
		$this->input->post('');
	}

	/*
	 * Parents can subscribe to alerts
	 * */
	function subscribe(){
		$fname = $this->input->post('sub_fname');
		$email = $this->input->post('sub_email');
		$industry = $this->input->post('sub_industry');
		$cur_url = $this->input->post('page_url');
		
		/* Validate */
		$this->form_validation->set_rules('sub_fname', 'First name', 'required');
		$this->form_validation->set_rules('sub_industry', 'Industry', 'required');
		$this->form_validation->set_rules('sub_email', 'E-mail address', 'required|valid_email');
		
		if($this->form_validation->run() == FALSE){
			$this->connect();
		}
		else{
			$body = 'First name: '.$fname.'<br/>Last name: '.$lname.'<br/>Organization: '.
				$organization.'<br/>E-mail: '.$email;
			
			//Send confirmation e-mail to USER
			$user_to = $email;
			$user_full_name = $yname.' '.$lname;
			$user_subject = 'Thank you for contacting us.';
			$user_body = '<p>Thank you for connecting with us. We will be sure to keep in touch.</p>';
			
			//Send an email to FANISI
			$to_email = $email;
			$to_full_name = 'Uwezo Tenders';
			$to_subject = 'Uwezo Tenders Subscription Request';
			$to_body = $body;
			
			$this->email_model->sendMail($to_email, $to_full_name, $to_subject, $to_body);
			$this->session->set_flashdata('sub_success', 'Your message has been sent: You will receive an e-mail shortly.');
			
			redirect($cur_url);
		}
	}
}