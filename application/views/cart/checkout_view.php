<div id="midsection">
	<?php $this->load->view('utils/leftnav'); ?>

	<div class="box-grid34" id="midbox">
		<h1>Checkout</h1>
	
		<div id="checkout_holder">
			<div id="product_check" class="checkout_box">
			<div class="checkout_header">Products</div>
			<?php
			
				$status_message = $this->session->flashdata('result');
				
				if ($status_message != ''){
					echo "<div class='status_message'>$status_message</div>";
				}
				
				if($this->cart->contents()){
					echo "<table id='cart_table' cellspacing='5' cellpadding='3'>
					<tr style='font-weight:bold;text-decoration:underline;'>
					<td>Item</td>
					<td>Qty</td>
					<td>Sub(KES.)</td>
					<td>o</td></tr>";
					
					if($cart = $this->cart->contents()){
						
						foreach($cart as $item){
							echo "<tr>";
							echo "<td>".$item['name']."</td>";
							echo "<td>".$item['qty']."</td>";
							echo "<td>KES. ".$item['subtotal']."</td>";
							echo "<td class='remove'>";
							echo anchor('cart/remove/'.$item['rowid'].
							"/cart", 'X', array('title'=>'Click to remove'));
						}
						echo "<tr style='background:#CCED7B;'>
							<td></td>
							<td>TOTAL</td>
							<td style='font-weight:bold;'>KES. ".
							$this->cart->total()."</td>
							<td></td></tr></table>";
					}
				}
				else{
					echo "<p align:center;'><h2>Your Cart is empty</h2>".
					anchor('/', 'Continue Shopping', 
					array('id'=>'checkout_but', 'class'=>'ui_button'))."</p>";
				}
			?>
			<br class="cls"/>
			</div>
			
			<div id="buyer_check" class="checkout_box">
			<div class="checkout_header">Buyer Information</div>
			<span class='error'>( * - required fields)</span>
			<?php
				
				//Give out any validation errors
				echo validation_errors('<li class="error">', '</li>')."<br/>";
			
				//Buyer info
				echo form_open('cart/processcart');
				
				echo "<table class='formtable'><tr><td>";
				echo form_label('Individual/Company Names')."</td><td>";
				echo form_input('names', set_value('names'));
				echo "<span class='error'>".form_error('names')."</span></td></tr><tr><td>";
				
				echo form_label('E-mail')."</td><td>";
				echo form_input('email', set_value('email'));
				echo "<span class='error'>".form_error('email')."</span></td></tr><tr><td>";
				
				echo form_label('Phone Number')."</td><td>";
				echo form_input('phone', set_value('phone'));
				echo "<span class='error'>".form_error('phone')."</span></td></tr><tr><td>";
				
				echo form_label('Postal Address')."</td><td>";
				echo form_input('address', set_value('address'));
				echo "<span class='error'>".form_error('address')."</span></td></tr><tr><td>";
				
				echo form_label('City')."</td><td>";
				echo form_input('city', set_value('city'));
				echo "<span class='error'>".form_error('city')."</span></td></tr><tr><td>";
				
				echo form_label('Post code')."</td><td>";
				echo form_input('postcode', set_value('postcode'));
				echo "<span class='error'>".form_error('postcode')."</span></td></tr><tr><td>";
				
				echo form_label('Country')."</td><td>";
				echo form_input('country', set_value('country'));
				echo "<span class='error'>".form_error('country')."</span></td></tr></table>";
			?>
			<br class="cls"/>
			</div>
			
			<div id="payment_check" class="checkout_box">
			<div class="checkout_header">Payment Options</div>
				<ol>
					<li><h3>M-Pesa</h3>
						<p>Send to M-Pesa: <strong><?php echo $this->config->item('phone_1'); ?></u></strong> or call us on the same number</p>
					</li>
					<br/>
					<span class="ps_note">
						PS: Once the payment is made, we will begin processing your order.
					</span>
				</ol>
			
				<p><br/>
				<?php
					$status = array(
						'name' => 'checkout_but',
						'id' => 'checkout_but',
						'value' => 'Finish and Place Order',
						'type' => 'submit',
					);
					
					//Disable button if cart is empty
					if($this->cart->contents() == 0){
						$status = array(
							'name' => 'checkout_but',
							'id' => 'checkout_but',
							'value' => 'Finish and Place Order',
							'type' => 'submit',
							'disabled' => 'disabled'
						);
					}
					
					echo form_submit($status);
					echo form_close();
				?></p>
			<br class="cls"/>
			</div>
		</div>
	</div>
<br class="cls"/>
</div><!--End midsection-->