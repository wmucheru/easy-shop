<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class e404 extends CI_Controller {
	/*
	 * Redirect for all 404 errors
	 * */
	public function __construct(){ parent::__construct(); }
	
	function index(){
		$this->output->set_status_header('404');
		$data['content'] = '404view';
		$this->load->view('404view', $data);
	}
}