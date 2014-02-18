	<!--Mid-->
	<div id="midsection" class="container">
	<h1>Shopping Cart</h1>
	<div id="cart_holder">
		<table id="cart_table" cellspacing="5" cellpadding="3">
		<thead>
		<tr id="table_header">
			<td>Item</td>
			<td>Quantity</td>
			<td>Subtotals (KES.)</td>
			<td>o</td>
		</tr>
		<thead>
		<?php
			
			if($cart = $this->cart->contents()){
				
				foreach($cart as $item){
					echo "<tr>";
					echo "<td>".$item['name']."</td>";
					echo "<td>".$item['qty']."</td>";
					echo "<td>KES. ".$item['subtotal']."</td>";
					echo "<td class='remove'>";
					echo anchor('cart/remove/'.$item['rowid'].
						"/cart", 'X');
					echo "</td></tr>";
				}
			}
			
			echo "</table>";
		?>
		<div class="totals_holder">
			TOTAL(KES): <span class="totals">
			<?php echo $this->cart->total(); ?></span><br/><br/>
			<p><?php echo anchor('cart/checkout', 'Checkout Now', array('id'=>'checkout_but', 'class'=>'ui_button')); ?></p>
			<p><?php echo anchor('/', 'Continue Shopping', array('id'=>'checkout_but', 'class'=>'ui_button_reset')); ?></p>
		</div>
	</div>
	<div style="clear:both;"></div>
	</div>