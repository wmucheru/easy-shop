<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ob_start();

class Profile extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	function index(){
		$this->function_model->_makePages(
				'prof-bd', 
				'Company Profile', 
				'profile/index'
		);
	}
	
	function pricing(){
		$this->function_model->_makePages(
				'price-bd', 
				'Pricing', 
				'about/pricing'
		);
	}
	
	function testimonials(){
		$this->function_model->_makePages(
				'test-bd', 
				'Testimonials', 
				'about/testimonials'
		);
	}
	
	/*
	 * All Legalities concerning the Use and Running of the website
	 * 
	 * */
	function terms(){
		$this->function_model->_makePages(
				'terms-bd', 
				'Terms of Use', 
				'about/terms'
		);
	}
	
	function privacy(){
		$this->function_model->_makePages(
				'priv-bd', 
				'Privacy Policy', 
				'about/privacy'
		);
	}
	
	function security(){
		$this->function_model->_makePages(
				'sec-bd', 
				'Tender Security', 
				'about/security'
		);
	}
	
	function unsubscribe(){
		$this->function_model->_makePages(
				'unsub-bd', 
				'Unsubscribe from Alerts', 
				'about/unsubscribe'
		);
	}
	
	function sitemap(){
		$this->function_model->_makePages(
				'map-bd', 
				'Our Sitemap', 
				'about/sitemap'
		);
	}
}