<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ob_start();

class Products extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	function index(){
		$this->function_model->_makePages(
				'prod-bd', 
				'Our Products', 
				'products/index.php'
		);
	}
	
	function categories(){
		
	}
	
	function view($product_id){
		$prod = $this->products_model->getProductDetail($product_id);
		
		$this->function_model->_makePages(
				'prod-bd', 
				'Our Products', 
				'products/view.php',
				$prod
		);
	}
}
