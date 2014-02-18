	<div class="box-grid4 righter" id="rightnav">
		<div id="nav_shopping_cart" class="nav_holder">
			<div class="box_header">Shopping Cart
			<span class="nav_header_link">
			<?php echo anchor('cart/', 'Open cart', array('title'=>
			'View shopping cart', 'id'=>'view_cart_link')); ?></span>
			</div>
			<div class="nav_containers scroll-pane" 
				style="border-bottom:1px solid #AFAFAF;min-height:15em;">
			<?php
				
			if($this->cart->contents()){
				
				echo "<table cellspacing='2' cellpadding='2'>
				<tr style='font-weight:bold;text-decoration:underline;'>
				<td>Item</td><td>Qty</td><td>Sub(KES.)</td><td>o</td></tr>";
				
				if($cart = $this->cart->contents()){
					
					foreach($cart as $item){
						echo "<tr>";
						echo "<td>".$item['name']."</td>";
						echo "<td>".$item['qty']."</td>";
						echo "<td>".$item['subtotal']."</td>";
						echo "<td class='remove'>";
						echo anchor('cart/remove/'.$item['rowid'].
							"/cart/", 'X');
						echo "</td></tr>";
					}
				}
				echo "</table>";
				
			}
			else{
				echo "<p style='text-align:center;'>Your cart is empty</p>";
			}
			?>
			
			</div>
			<div><p class="text-center"> 
			<?php 
				echo " Total = <span style='font-weight:bold;
				font-size:16px;'>KES. ".$this->cart->total()."</span><br/><br/>";
				echo anchor('cart/checkout', 
					'Checkout Now', array('id'=>'checkout_but', 'class'=>'uibutton',
					'title'=>'Proceed to pay'));
			?> </p>
			</div>
			<br class="cls"/>
		</div>
		
		<div id="nav_contacts" class="nav_holder">
			<div class="box_header">Our Contacts for any enquiries</div>
			<br/>
			<ul>
				<li><strong><?php echo $this->config->item('phone1'); ?></strong></li>
				<li><strong><a href="mailto:<?php echo $this->config->item('email1'); ?>">
					<?php echo $this->config->item('email1'); ?></a></strong></li>
			</ul>
			<br/>
		</div>
	</div>