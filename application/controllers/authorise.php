<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authorise extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('log')==TRUE){
			//Find out type of user and redirect accordingly
			redirect('company');
		}
	}
	
	/*
	 * Default page is login
	 * 
	 * */
	function index(){
		$this->function_model->_makePages(
				'login-bd', 
				'Login', 
				'login'
		);
	}
	
	//Login then take you back to referring page
	function login_exec(){
		$email = $this->input->post('lg_email');
		$passwd = $this->input->post('lg_pass');
		$login_ip = $this->input->ip_address;
		
		//Redirect to page user was before login
		$refpg = $this->agent->referrer();
		
		$this->form_validation->set_rules('lg_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('lg_pass', 'Password', 'required');
		
		if($this->form_validation->run() == FALSE){
			$this->index();
		}
		else{
			//Get the user details from the database
			$login_ = $this->function_model->authorize($email, $passwd);
			$user_id = '';
			$edit_date = date('Y-m-d H:i:s');
			
			if($login_){
				//Create session data for user
				foreach($login_ as $lg){
					$userdata = array(
							'uid' => $lg->user_id,
							'utype' => $lg->user_type,
							'cid' => $lg->company_id,
							'fnames' => $lg->fnames,
							'email_ad' => $lg->email_ad,
							'log' => TRUE
					);
					//var_dump($login_);
					$user_id = $lg->user_id;
					$this->session->set_userdata($userdata);
				}
				
				$edit = array('last_login'=>$edit_date, 'login_ip'=>$login_ip);
				$condition = array('user_id'=>$user_id);
				
				//Add last login time to register table
				$this->function_model->editItems('tn_register', $edit, $condition, '');
				redirect('company');
			}
			else{
				$this->session->set_userdata('error_msg', 'Enter the correct login details');
				$this->index();
			}
		}
	}

	/*REGISTER FOR AN ACCOUNT*/
	function register(){
		$this->function_model->_makePages(
				'register-bd',
				'Register', 
				'register'
		);
	}
	
	function register_exec(){
		//var_dump($this->input->post());
		$ip_addr = $this->input->ip_address;
		
		$company = $this->input->post('company_name');
		$industry = $this->input->post('industry');
		$desc = $this->input->post('desc');
		$postal_addr = $this->input->post('postal_addr');
		$county = $this->input->post('county');
		$phy_addr = $this->input->post('phy_addr');
		$phone1 = $this->input->post('phone1');
		$website = $this->input->post('website');
		$fnames = $this->input->post('fnames');
		$email_ad = $this->input->post('email_ad');
		$phone2 = $this->input->post('phone2');
		$passwd = $this->input->post('passwd');
		$rpasswd = $this->input->post('rpasswd');
		
		$image = $this->function_model->uploader('cmp','comp_img');
		
		$this->form_validation->set_rules('company_name', 'Company Name', 'required|max_length[128]');
		$this->form_validation->set_rules('industry', 'Industry', 'required|max_length[64]');
		$this->form_validation->set_rules('desc', 'Description', 'required');
		$this->form_validation->set_rules('postal_addr', 'Postal Address', 'requiredmax_length[128]');
		$this->form_validation->set_rules('county', 'County', 'required|max_length[64]');
		$this->form_validation->set_rules('phy_addr', 'Physical Address', 'max_length[128]');
		$this->form_validation->set_rules('phone1', 'Company Tel./Mobile', 'required|max_length[32]');
		$this->form_validation->set_rules('website', 'Website', 'max_length[128]');
		$this->form_validation->set_rules('fnames', 'Full Names', 'required|max_length[128]');
		$this->form_validation->set_rules('email_ad', 'Email Address', 'required|valid_email|max_length[128]');
		$this->form_validation->set_rules('phone2', 'Representative Tel./Mobile', 'required|max_length[32]');
		$this->form_validation->set_rules('passwd', 'Password', 'required|matches[rpasswd]');
		
		if($this->form_validation->run() == FALSE){
			$this->register();
		}
		else{
			//Encrypt the password
			$passwd = $this->function_model->encrypt_pwd($passwd);
			
			$reg_array = array(
				'fnames' => $fnames,
				'email_ad' => $email_ad,
				'phone1' => $phone1,
				'phone2' => $phone2,
				'postal_addr' => $postal_addr,
				'county' => $county,
				'phy_addr' => $phy_addr,
				'password' => $passwd,
				'ip_address' => $ip_addr,
			);

			//If in add mode, get the Id of last inserted
			$this->function_model->addItems('tn_register', $reg_array, '');
			$userId = $this->db->insert_id();
			
			$comp_array = array(
				'user_id_fk' => $userId,
				'company_name' => $company,
				'industry' => $industry,
				'description' => $desc,
				'image' => $image,
				'website' => $website,
			);
			$this->function_model->addItems('tn_companies', $comp_array, '');
			
			//Should redirect to the account of the user and show this on list
			redirect('authorise/register_success');
		}
	}
	
	//Show success page
	function register_success(){
		$this->function_model->_makePages(
				'register-bd',
				'Registration Successful', 
				'reg_success'
		);
	}

	/*
	 * Send a link to users pasword to reset their account passwords
	 * 
	 * */
	function resetacc(){
		$this->function_model->_makePages(
				'reset-bd', 
				'Reset User Account', 
				'reset'
		);
	}

	/*
	 * Send a reset link to the user's email
	 * */
	function reset_exec(){
		$email = $this->input->post('res_email');
		
		$this->function_model->resetuser($email);
	}

	/*
	 * Send unsubscrube link to user's email: prevent thiefery.
	 * Clicking on the link, removes you from the mailing list
	 * */
	function unsub_exec(){
		$email = $this->input->post('unsub_email');
		
		$this->function_model->resetuser($email);
	}
}
