<?php

class Function_model extends CI_Model{
	
	var $gallery_path;
	var $gallery_path_url;
	var $hashx;
	var $months;

	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Africa/Nairobi");
		
		$this->gallery_path = realpath(APPPATH . '../uploads');
		$this->gallery_path_url = base_url().'uploads';
		$this->hashx = $this->config->item('shubix');
	}
	
	function _dateconv($date){
		$convert = date('Y-m-d H:i:s', strtotime($date));
		return $convert;
	}
	
	//Pimped form errors
	function show_error($field){
		echo form_error($field, '<span class="form-msg error">', '</span>');
	}
	
	function logged_in(){
		if($this->session->userdata('log')==FALSE){
			//Find out type of user and redirect accordingly
			redirect('authorise');
		}
	}
	
	/*
	 * Function to build pages dynamically
	 * */
	function _makePages($body_id, $pg_title, $pg_content, $data_array='', $pg_type=''){
		$data['body_id'] = $body_id;
		$data['pg_title'] = $pg_title;
		$data['page_content'] = $pg_content;
		$data['array1'] = $data_array;
		
		$template = '';
		
		if($pg_type==''){
			$template = 'utils/template';
		}
		else{
			$template = 'utils/template_admin';
		}
		$this->load->view($template, $data);
	}
	
	/*
	 * List counties for forms of link lists
	 * */
	function listData($name='', $type=''){
		$array = array();
		
		if($name=='county'){ $array = $this->counties; }
		elseif($name=='industry'){ $array = $this->industries; }
		elseif($name=='tntype'){ $array = $this->tntype; }
		elseif($name=='items'){ $array = $this->items; }
		
		if($type=='object'){
			//Produce multi-dimension array (For <select>)
			$array = array_combine($array, $array);
		}
		
		return $array;
	}
	
	/*
	 * LOGIN AND SESSION MANAGEMENT
	 * */
	function encrypt_pwd($passwd){
		$encrypt = sha1($passwd.$this->hashx);
		return $encrypt;
	}
	
	function authorize($email, $password){
		$this->db->select('user_id,user_type,company_id,fnames,email_ad');
		$this->db->from('tn_register');
		
		$password = sha1($password.$this->hashx);
		$where = array('email_ad'=>$email, 'password'=>$password, 'tn_register.deleted'=>0);
		$this->db->where($where);
		
		$this->db->join('tn_companies', 
			'tn_register.user_id = tn_companies.user_id_fk', 'left');
		$auth = $this->db->get();
		
		if($auth->num_rows() > 0){
			return $auth->result();
		}
		else{ return false; }
	}
	
	function end_session(){
		$this->session->unset_userdata('uid');
		$this->session->unset_userdata('utype');
		$this->session->unset_userdata('fnames');
		$this->session->unset_userdata('email_ad');
		$this->session->unset_userdata('log');
	}
	
	/*
	 * ACTIVITIES: Keeps a log of user activities: eg.
	 * 
	 * 1. Last login: 
	 * 2. Commercial transactions: 
	 * 3. 
	 * 
	 * */
	function addActivity(){
		
	}
	
	/*
	 * Send rest account link to user email
	 * 
	 * The link will contain a hash stored into the user hash column,
	 * and a confirmation salt generated by the system.
	 * 
	 * Register table for company, User table for employees
	 * 
	 * */
	function resetuser($email){
		$salt = $this->hashx;
		$cipher = sha1($salt.$email);
		
		$link = site_url('authorise/'.$cipher.'/reset');
		$array = array('reset_hash'=>$link);
		$condition = array('email_ad'=>$email);
		
		echo $link;
		//$this->editItems('tn_register', $array, $condition, $dataname);
		
		//Finally send email
		$this->sendMail('normal', '');
	}
	
	/*
	 * ADMIN FUNCTIONS
	 * 
	 * */
	function getCompanyData($user_id){
		$this->db->select('*');
		$this->db->from('tn_register');
		
		$where = array('user_id'=>$user_id);
		$this->db->where($where);
		
		$this->db->join('tn_companies', 
			'tn_register.user_id = tn_companies.user_id_fk', 'left');
		$auth = $this->db->get();
		
		if($auth->num_rows() > 0){
			return $auth->result();
		}
		else{ return false; }
	}
	
	/*
	 * SEARCH for all tenders within the database using variables in question
	 * 
	 * */
	function search_tender($tnsearchtxt='', $tnindustry='', $tntype=''){
		$this->db->select('*');
		$this->db->from('tn_tenders');
		
	}
	
	/*
	 * ADD, EDIT, GET, DELETE
	 * 
	 * */
	function addItems($table, $array, $dataname){
		$qry = $this->db->insert($table, $array);
		
		if($qry){
			if($dataname!=''){
				$this->session->set_userdata('success_msg', $dataname.' successfully posted.');
				return true;
			}
		}
		else{
			if($dataname!=''){
				$this->session->set_userdata('error_msg', $dataname.' could not be posted. Try again later.');
				return false;
			}
		}
	}
	
	/*
	 * Updates data. Requires the following parameters:
	 * 
	 * 1. table: Name of the table to be updated
	 * 2. array: Array of data to be updated
	 * 3. edit_array: Array of conditions for rows to be updated
	 * 
	 * */
	function editItems($table, $array, $condition, $dataname){
		$qry = $this->db->update($table, $array, $condition);
		
		if($qry){
			if($dataname!=''){
				$this->session->set_userdata('success_msg', $dataname.' successfully updated.');
				return true;
			}
		}
		else{
			if($dataname!=''){
				$this->session->set_userdata('error_msg', $dataname.' could not be updated. Try again later.');
				return false;
			}
		}
	}
	
	/*
	 * Deletes data by adding '1' to delete column. For regular users and is reversible
	 * 
	 * */
	function deleteItem($table, $del_array){
		$data = array('deleted'=>1);
		$qry = $this->db->update($table, $data, $del_array);
		
		if($qry){
			if($dataname!=''){
				$this->session->set_userdata('success_msg', $dataname.' has been deleted.
					<a class="undo-lnk" href="'.site_url().'">Undo</a>');
				return true;
			}
		}
		else{
			if($dataname!=''){
				$this->session->set_userdata('error_msg', $dataname.' could not be deleted. Try again later.');
				return false;
			}
		}
	}
	
	/*
	 * Deletes data permanently. Super Admin only can do this
	 * 
	 * */
	function deleteComplete($table, $del_array){
		$qry = $this->db->delete($table, $del_array);
		
		if($qry){
			if($dataname!=''){
				$this->session->set_userdata('success_msg', $dataname.' has been deleted permanently.
					<a class="undo-lnk" href="'.site_url().'">Undo</a>');
				return true;
			}
		}
		else{
			if($dataname!=''){
				$this->session->set_userdata('error_msg', $dataname.' could not be deleted. Try again later.');
				return false;
			}
		}
	}
	
	/*
	 * Get Tenders
	 * 
	 * Individual and all company tenders
	 * 
	 * $all : to show all tenders on the homepage etc.
	 * */
	function getTenders($tender_id='', $all=''){
		$tenders = array();
		$this->db->select('*');
		$this->db->from('tn_tenders');
		
		if($tender_id!=''){
			$this->db->where('tn_tenders.tender_id', $tender_id);
		}
		
		if($all!=''){
			$this->db->join('tn_tender_details', 
				'tn_tender_details.tender_id_fk = tn_tenders.tender_id', 'left');
		}
		
		$tenders = $this->db->get();
		return $tenders->result();
	}
	
	//Get tender details
	function getTenderDetails($tender_id=''){
		$tenders = array();
		$this->db->select('*');
		$this->db->from('tn_tender_details');
		
		if($tender_id!=''){
			$this->db->where('tn_tender_details.tender_id_fk', $tender_id);
		}
		
		//$this->db->join('tn_tender_details', 
		//	'tn_tender_details.tender_id_fk = tn_tenders.tender_id', 'left');
		
		$tenders = $this->db->get();
		return $tenders->result();
	}
	
	//Count the no. of tender details for a given tender
	function countTenderDetails($tender_id){
		$this->db->where('tn_tender_details.tender_id_fk', $tender_id);
		$this->db->from('tn_tender_details');
		return $this->db->count_all_results();
	}
	
	function getCompanyTenders($user_id){
		$tenders = array();
		$this->db->select('*');
		$this->db->from('tn_tenders');
		$this->db->order_by('date_added', 'desc');
		
		$this->db->where('tn_tenders.user_id_fk', $user_id);
		// $this->db->join('tn_tender_details', 
			// 'tn_tender_details.tender_id_fk = tn_tenders.tender_id', 'left');
		$tenders = $this->db->get();
		
		return $tenders->result();
	}
	
	function getInfo($table='', $order=''){
		$this->db->order_by("date_added", $order);
		$info = $this->db->get($table);
		
		if($info){ return $info->result(); }
	}
	
	function getDetail($table='', $detail_id=''){
		$sql = "SELECT * FROM $table WHERE $orderid = 1";
		$ord = $this->db->query($sql);
		
		if($ord->result()){ return $ord->result(); }
	}

	/*
	 * Deletes data from table. Requires the following parameters:
	 * 
	 * 1. table: Name of the table to be updated
	 * 2. array: Array of data to be updated
	 * 3. edit_array: Array of conditions for rows to be updated
	 * 
	 * */
	function deleteItems($table, $array, $dataname){
		$qry = $this->db->delete($table, $array);
		
		if($qry){
			$this->session->set_userdata('success_msg', $dataname.' successfully deleted.');
			return true;
		}
		else{
			$this->session->set_userdata('error_msg', $dataname.' could not be deleted. Try again later.');
			return false;
		}
	}
	
	/*
	 * USERS
	 * 
	 * */
	function getUserData($userid=0){
		$users = array(); 
		
		/*Joins*/
		if($userid!=0){ //If we view individual admin
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('users.user_id', $userid);
			$this->db->join('orders', 'orders.user_id = users.user_id', 'left');
			$this->db->join('order_details', 'orders.order_id = order_details.order_id', 'left');
			$users = $this->db->get();
		}
		else{
			$users = $this->db->get('users');
		}
		
		if($users->result()){ return $users->result(); }
	}
	
	/*
	 * Upload images into the uploads folder
	 * 
	 * */
	function uploader($img_name, $fieldname){
		$filename = $img_name.'_'.date('YMd').'_'.rand(0, 1000);
		//$date_added = unix_to_human(time());
		
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path,
			'max_size' => 2000,
			'file_name' => $filename
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload($fieldname);
		$image_data = $this->upload->data();
		
		if(isset($image_data)){
			$config = array(
				'source_image' => $image_data['full_path'],
				'new_image' => $this->gallery_path . '/thumbs',
				'maintain_ration' => true,
				//'width' => 250,
				'height' => 250
			);
			
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			
			//Return the image name
			//var_dump($image_data);
			return $filename.$image_data['file_ext'];
		}
		else{
			return false;
		}
	}
	
	/*
	 * E-mails
	 * 
	 * */
	function _prep(){
		#house-keeping
		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$config['protocol'] = 'sendmail';
		$this->email->initialize($config);
	}

	/*
	 * Send Email: notifications, confirmations, activations, updates
	 * 
	 * */
	function sendMail($type, $from_email, $sender_name, $subject, $body){
		$this->_prep();
		$this->email->from($from_email, $sender_name);
		$this->email->to('willyk99@gmail.com');

		$template = $this->template();
		$template = preg_replace("/{res_name}/", $full_name, $template);
		$template = preg_replace("/{content}/", $body, $template);

		$this->email->subject($subject);
		$this->email->message($template);
		$this->email->send();
	}
	
	function template(){
		$img_url = base_url('images/logo.png');
		
		//Normal Email Template
		$html_cont = '<table border="0" cellspacing="5" cellpadding="5" width="100%" 
					style="line-height:1.6em;margin:0;padding:0;font:12px Tahoma;">
					
					<tr style="background:#efefef;padding:0;margin:0;">
						<td style="padding:10px 20px;margin:0;">
							<img src="'.$img_baseurl.'" alt=""/> </td>
					</tr>
					<tr style="padding:0;margin:0;">
						<td style="padding:10px 20px 20px;margin:0;">
							<p>{content}</p>
							
							<p style="font-size: 14px; line-height: 22px; margin: 10px 0pt 0pt;">
								Best Regards, <br/><strong>{res_name}</strong></p>
						</td>
					</tr>
					<tr style="background:#3FAE29;margin:0;padding:0;font-size:11px;">
						<td style="padding:20px;margin:0;"><span>Copyright 2013, Fanisi Capital Ltd. </span>
						<span style="float:right;">
							<a style="margin-right:10px;color:#ffffff;text-decoration:none;" href="http://www.fanisi.com/index.php/index/info" style="">FAQ</a> 
							<a style="margin-right:10px;color:#ffffff;text-decoration:none;" href="http://www.fanisi.com/index.php/index/about">About Us</a> 
							<a style="margin-right:10px;color:#ffffff;text-decoration:none;"  href="http://www.fanisi.com/index.php/index/connect">Contact Us</a>
							<a style="color:#ffffff;text-decoration:none;"  href="http://www.fanisi.com/index.php/index/portfolio">Portfolio</a> 
						</span></td>
					</tr>
				</table>';
		return $html_cont;
	}
}