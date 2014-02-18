
<div id="midsection">
	<div class="box-grid34" id="midbox">
		<h1>Shopping Cart</h1>
		<div id="cart_holder">
			<table class="formtable" id="cart_table" cellspacing="5" cellpadding="3">
			<thead>
			<tr>
				<th>Item</th>
				<th>Quantity</th>
				<th>Subtotals (KES.)</th>
				<th>Action</th>
			</tr>
			<thead>
			<?php 
				if($cart = $this->cart->contents()){
					foreach($cart as $item){
			?>
			<tr>
				<td><?php echo $item['name'];  ?></td>
				<td><?php echo $item['qty']; ?></td>
				<td>KES. <?php echo $item['subtotal']; ?></td>
				<td class='remove'>
				<?php echo anchor('cart/remove/'.$item['rowid']."/cart", 'remove'); ?>
				</td>
			</tr>
			<?php } //end foreach
				}//end ifelse
			?>
			</table>
			
			<div class="totals_holder">
				TOTAL(KES): <span class="totals">
				<?php echo $this->cart->total(); ?></span><br/><br/><br/>
				<div><?php echo anchor('cart/checkout', 'Checkout Now &rarr;', 
					array('id'=>'checkout_but', 'class'=>'uibutton btn-block')); ?> 
					<?php echo anchor('products', '&larr; Continue Shopping', 
					array('id'=>'checkout_but', 'class'=>'uibutton btn-block btn-info')); ?></div>
			</div>
		</div>
	</div>
	
	<?php $this->load->view('utils/rightnav'); ?>
<br class="cls"/>
</div><!--End midsection-->