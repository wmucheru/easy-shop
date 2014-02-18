<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller{

	function index(){

		//Load the main content to template view
		$data['page_content'] = 'cart/cart_view';
		$data['pagetitle'] = "Shopping cart - ".$this->config->item('site_name');
		
		$data['meta_description'] = "Using our state of the art shopping cart you can now shop 
								for the Best of Kenya's Agriculture, Flowers, Seafood 
								and Animal products online and have them delivered to you.";
		$data['meta_keywords'] = "Online shopping, shopping cart,Kenya's Agriculture,Flowers, Fruits, 
							sausages, Pork, Meat, Seafood, poultry, Fish, Rabbit meat, 
							legumes, Cereals, Tubers and Goat Meat, best prices";
							
		$data['body_id'] = "agricart";
		
		//Load view
		$this->load->view('utils/template', $data);
	
	}
	
	/* Place an order for a particular item
		@params id
		@return array(name, amount, )
	*/
	function order(){
		/* Load the main content to template view */
		$data['page_content'] = 'cart/placeorder_view';
		$data['pagetitle'] = "Place Order - ".$this->config->item('site_name');
		
		$data['meta_description'] = "Place your orders online for the Best of Kenya's Agriculture, 
								Flowers, Seafood and Animal products online and have them delivered to you.";
		$data['meta_keywords'] = "Online shopping, shopping cart,Kenya's Agriculture,Flowers, Fruits, 
							sausages, Pork, Meat, Seafood, poultry, Fish, Rabbit meat, 
							legumes, Cereals, Tubers and Goat Meat, best prices";
		$data['body_id'] = "agrihome";
		
		/* Load view */
		$this->load->view('utils/template', $data);
	}
	
	/*
		Extracts the prodcut info from the database in reference to product id
		
		@returns array of product info
	*/
	function _getProductInfo(){
		
	}
	
	/* 
		Add items to cart 
	*/
	function add(){
		//Get the id of the product
		$prod_id = $this->input->post('id');
		$product = $this->products_model->getProductDetail($prod_id);
		
		//Amount entered
		$prod_amt = $this->input->post('qty_box');
		
		//field name, error message, validation rules
		$this->form_validation->set_rules('qty_box', 'Quantity', 'trim|required|integer|max_length[10]');
		$this->form_validation->set_message('integer', 'You must enter a number.');
		
		//If the validation is successful and errrors are found
		if($this->form_validation->run() == FALSE || $prod_amt == ''){
			redirect('products/view/'.$prod_id);
		}
		else{
			//Add to cart
			$product_id = $this->input->post('id');
			$product_qty = $this->input->post('qty_box');
			
			$insert = array(
				'id' => $product_id,
				'qty' => $product_qty,
				'name' => $product->name,
				'price' => $product->price,
				'quantity' => $product->quantity,
				'unit' => $product->unit
			);
			
			$cart_items = $this->cart->contents();
			$this->cart->insert($insert);
			$this->session->set_flashdata('result', $product->name.' added to shopping cart.');
			
			redirect('products');
		}
	}
	
	/* Remove items from the cart */
	function remove($rowid, $page){
		$this->cart->update(array(
			'rowid' => $rowid,
			'qty' => 0
		));
		redirect($page);
	}
	
	/* Update items in cart */
	function update($rowid){
		$data = array(
			'rowid' => $rowid,
			'qty' => '1'
		);
		$this->cart->update($data);
	}
	
	/* 
		Checkout from the cart
	*/
	function checkout(){
		/* Load the main content to template view */
		$data['page_content'] = 'cart/checkout_view';
		$data['pagetitle'] = "Checkout - ".$this->config->item('site_name');
		
		$data['meta_description'] = "Using our state of the art shopping cart you can now shop 
								for the Best of Kenya's Agriculture, Flowers, Seafood 
								and Animal products online and have them delivered to you.";
		$data['meta_keywords'] = "Online shopping, shopping cart,Kenya's Agriculture,Flowers, Fruits, 
							sausages, Pork, Meat, Seafood, poultry, Fish, Rabbit meat, 
							legumes, Cereals, Tubers and Goat Meat, best prices";
		$data['body_id'] = "agriprod";
		
		/* Load view */
		$this->load->view('utils/template', $data);
	}
	
	/*
		Order successful
	*/
	function ordersuccess(){
		/* Load the main content to template view */
		$data['page_content'] = 'cart/successorder_view';
		$data['pagetitle'] = "Order successful - ".$this->config->item('site_name');
		
		$data['meta_description'] = "Place your orders online for the Best of Kenya's Agriculture, 
								Flowers, Seafood and Animal products online and have them delivered to you.";
		$data['meta_keywords'] = "Online shopping, shopping cart,Kenya's Agriculture,Flowers, Fruits, 
							sausages, Pork, Meat, Seafood, poultry, Fish, Rabbit meat, 
							legumes, Cereals, Tubers and Goat Meat, best prices";
		$data['body_id'] = "agriprod";
		
		//Load view
		$this->load->view('utils/template', $data);
	}
	
	/*
		Load the cart items into the orders table.
		Destroy cart contents only after the order has been made.
	*/
	function processcart(){
		
		if(count($this->cart->contents()) != 0){
			
			//Get the actual information from the shopping cart
			$cart_items = $this->cart->contents();
			$cart_total = $this->cart->total();
			$order = false;
			
			//field name, error message, validation rules
			$this->form_validation->set_rules('names', 'Individual/Company name', 
				'trim|required|max_length[50]');
			$this->form_validation->set_rules('email', 'Email address', 
				'trim|required|valid_email|max_length[50]');
			$this->form_validation->set_rules('phone', 'Phone number', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[50]');
			$this->form_validation->set_rules('city', 'City', 'trim|required|max_length[50]');
			$this->form_validation->set_rules('postcode', 'Postcode', 'trim|required|max_length[20]');
			$this->form_validation->set_rules('country', 'Country', 'trim|required|max_length[50]');
			
			//I	f the validation is successful
			if($this->form_validation->run() == FALSE){
				
				$this->checkout();
			}
			else{
				
				//If placing of the order is successful
				if($this->orders_model->add_order($cart_items, $cart_total)){
				
					//Clear cart after order is placed
					$this->cart->destroy();
					redirect('cart/ordersuccess');
				}
				else{
					$this->checkout();
				}
			}
		}
		else{
			$this->session->set_flashdata('result', 'You cannot place an 
				order if shopping cart is empty.');
			$this->checkout();
		}
	}
	
}

?>