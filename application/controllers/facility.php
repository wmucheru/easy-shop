<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ob_start();

class Facility extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	function index(){
		$this->function_model->_makePages(
			'facil-bd', 
			'The School Facility', 
			'facility/index'
		);
	}
	
	function levels(){
		$this->function_model->_makePages(
			'facil-bd',
			'Kindergarten, Primary and Special Unit', 
			'facility/levels'
		);
	}
	
	function co_curricular(){
		$this->function_model->_makePages(
			'facil-bd',
			'Co-Curricular Activities', 
			'facility/co_curricular'
		);
	}
	
	function menu(){
		$this->function_model->_makePages(
			'facil-bd',
			'The School Facility', 
			'facility/menu'
		);
	}
	
	function shuttle(){
		$this->function_model->_makePages(
			'facil-bd',
			'The School Facility', 
			'facility/shuttle'
		);
	}
}