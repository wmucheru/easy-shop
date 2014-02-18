<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ob_start();

class Admission extends CI_Controller{
	
	var $user_id;
	var $cur_time;
	
	public function __construct(){
		parent::__construct();
		$this->cur_time = date('Y-m-d H:i:s');
	}
	
	//Check if select is empty
	function _check_empty($str){
		if ($str == 0){
			$this->form_validation->set_message('check_empty', 'Select the %s');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
	
	function index(){
		$this->function_model->_makePages(
				'admission-bd', 
				'Admission', 
				'admission/index'
		);
	}

	function fees(){
		$this->function_model->_makePages(
				'admission-bd', 
				'Fees Structure', 
				'admission/fees'
		);
	}

	function uniform(){
		$this->function_model->_makePages(
				'admission-bd', 
				'School Uniform', 
				'admission/uniform'
		);
	}

	//Online applications
	function register(){
		$this->function_model->_makePages(
				'admission-bd', 
				'Online Registration', 
				'admission/register'
		);
	}
	
	/*
	 * Save the registration details to the database
	 * */
	function register_exec(){
		//var_dump($this->input->post());
		//exit();
		
		//Child Details
		$child_fname = $this->input->post('child_fname');
		$child_mname = $this->input->post('child_mname');
       	$child_surname = $this->input->post('child_surname');
       	$child_sex = $this->input->post('child_sex');
       	$nationality = $this->input->post('nationality');
       	$religion = $this->input->post('religion');
       	$prev_school = $this->input->post('prev_school');
       	$child_dob = $this->input->post('child_dob');
       	$child_level = $this->input->post('child_level');
       	$school_time = $this->input->post('school_time');
       	
		//Mother Details
       	$mother_fname = $this->input->post('mother_fname');
       	$mother_mname = $this->input->post('mother_mname');
       	$mother_lname = $this->input->post('mothers_lname');
       	$mother_email = $this->input->post('mother_email');
       	$mother_telephone_no = $this->input->post('mother_telephone_no');
       	$mother_mobile_no = $this->input->post('mother_mobile_no');
       	$mother_occupation = $this->input->post('mother_occupation');
       	$mother_employer = $this->input->post('mother_employer');
		
		//Father Details
		$father_fname = $this->input->post('father_fname');
       	$father_mname = $this->input->post('father_mname');
       	$father_lname = $this->input->post('father_lname');
       	$father_email = $this->input->post('father_email');
       	$father_telephone_no = $this->input->post('father_telephone_no');
       	$father_mobile_no = $this->input->post('father_mobile_no');
       	$father_occupation = $this->input->post('father_occupation');
       	$father_employer = $this->input->post('father_employer');
		
		//Postal Details
       	$residential_addr = $this->input->post('residential_addr');
		$postal = $this->input->post('postal');
       	$city = $this->input->post('city');
		
		//Medical Details
       	//$child_allergies = $this->input->post('child_allergies');
       	$alergy_text = $this->input->post('alergy_text');
       	$family_doctor = $this->input->post('family_doctor');
       	$doctor_phone = $this->input->post('doctor_phone');
		
		/*
		 * SET THE VALIDATION RULES
		 * 
		 * */
		$this->form_validation->set_rules('child_fname', 'First Name of Child', 'required|xss_clean|max_length[54]');
		$this->form_validation->set_rules('child_mname', 'Middle Name', 'required|xss_clean|max_length[64]');
		$this->form_validation->set_rules('child_surname', 'Surname', 'required|xss_clean|max_length[64]');
		$this->form_validation->set_rules('child_sex', 'Sex', 'required|xss_clean|max_length[8]');
		$this->form_validation->set_rules('nationality', 'Nationality', 'required|xss_clean|max_length[64]');
		$this->form_validation->set_rules('religion', 'Religion', 'required|xss_clean|max_length[64]');
		$this->form_validation->set_rules('prev_school', 'Previous School', 'required|xss_clean|max_length[128]');
		$this->form_validation->set_rules('child_dob', 'Date of Birth', 'max_length[64]');
		$this->form_validation->set_rules('child_level', 'Child Level', 'required|xss_clean|max_length[64]');
		$this->form_validation->set_rules('school_time', 'School Time', 'required|xss_clean|max_length[64]');
		
		$this->form_validation->set_rules('mother_fname', 'Mother\'s Name', 'required|xss_clean|max_length[64]');
		$this->form_validation->set_rules('mother_mname', 'Mother\'s Middle Name', 'required|xss_clean|max_length[64]');
		$this->form_validation->set_rules('mother_lname', 'Mother\'s Last Name', 'required|xss_clean|max_length[64]');
		$this->form_validation->set_rules('mother_telephone_no', 'Mother Telephone No.', 'required|xss_clean|max_length[32]');
		$this->form_validation->set_rules('mother_mobile_no', 'Mother Mobile No.', 'required|xss_clean|max_length[32]');
		$this->form_validation->set_rules('mother_email', 'Mother\'s Email', 'required|xss_clean|max_length[128]');
		$this->form_validation->set_rules('mother_occupation', 'Mother\'s Occupation', 'required|xss_clean|max_length[128]');
		$this->form_validation->set_rules('mother_employer', 'Mother\'s Employer', 'required|xss_clean|max_length[128]');
		
		$this->form_validation->set_rules('father_fname', 'Father\'s First Name', 'required|xss_clean|max_length[64]');			
		$this->form_validation->set_rules('father_mname', 'Father\'s Middle Name', 'required|xss_clean|max_length[64]');			
		$this->form_validation->set_rules('father_lname', 'Father\'s Last Name', 'required|xss_clean|max_length[64]');
		$this->form_validation->set_rules('father_telephone_no', 'Father Telephone No.', 'required|xss_clean|max_length[32]');
		$this->form_validation->set_rules('father_mobile_no', 'Father Mobile No.', 'required|xss_clean|max_length[32]');
		$this->form_validation->set_rules('father_email', 'Father\'s Email', 'required|xss_clean|max_length[128]');
		$this->form_validation->set_rules('father_occupation', 'Father\'s Occupation', 'required|xss_clean|max_length[128]');
		$this->form_validation->set_rules('father_employer', 'Father\'s Employer', 'required|xss_clean|max_length[128]');
		
		$this->form_validation->set_rules('residential_addr', 'Detailed Residential Address', 'required|xss_clean');
		$this->form_validation->set_rules('postal', 'P.O. Box', 'required|xss_clean');
		$this->form_validation->set_rules('city', 'City', 'required|xss_clean|max_length[64]');
		
		$this->form_validation->set_rules('child_allergies', 'Child Allergies', 'required|xss_clean|max_length[64]');
		$this->form_validation->set_rules('alergy_text', 'State The alergy', 'required|xss_clean');
		$this->form_validation->set_rules('family_doctor', 'Name of Family Doctor', 'max_length[128]');
		$this->form_validation->set_rules('doctor_phone', 'Doctor Phone', 'required|xss_clean');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if($this->form_validation->run() == FALSE){
			$this->index();
		}
		else{
			$reg_array = array(
			       	'child_fname' => $child_fname,
			       	'child_mname' => $child_mname,
			       	'child_surname' => $child_surname,
			       	'child_dob' => $child_dob,
			       	'child_sex' => $child_sex,
			       	'nationality' => $nationality,
			       	'child_level' => $child_level,
			       	'religion' => $religion,
			       	'prev_school' => $prev_school,
			       	'school_time' => $school_time,
			       	
			       	'mother_fname' => $mother_fname,
			       	'mother_mname' => $mother_mname,
			       	'mother_lname' => $mother_lname,
			       	'mother_email' => $mother_email,
			       	'mother_telephone_no' => $mother_telephone_no,
			       	'mother_mobile_no' => $mother_mobile_no,
			       	'mother_occupation' => $mother_occupation,
			       	'mother_employer' => $mother_employer,
			       	
			       	'father_fname' => $father_fname,
			       	'father_mname' => $father_mname,
			       	'father_lname' => $father_lname,
			       	'father_email' => $father_email,
			       	'father_telephone_no' => $father_telephone_no,
			       	'father_mobile_no' => $father_mobile_no,
			       	'father_occupation' => $father_occupation,
			       	'father_employer' => $father_employer,
			       	
			       	'residential_addr' => $residential_addr,
			       	'postal' => $postal,
			       	'city' => $city,
			       	// 'child_allergies' => $child_allergies,
			       	'alergy_text' => $alergy_text,
			       	'family_doctor' => $family_doctor,
			       	'doctor_phone' => $doctor_phone,
			       	// 'date_of_application' => $date_of_application
			);
			
			$this->function_model->addItems('register', $reg_array, 'Details');
			redirect('admission');
		}
	}
}
