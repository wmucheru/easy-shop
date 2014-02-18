<div id="midsection">
	<?php $this->load->view('utils/leftnav'); ?>

	<div class="box-grid34" id="midbox">
		<h1>Order successful!</h1>
		<div id="success_holder" style='font-size:15px;line-height:1.6em;'>
		
		We have received your order.
		<ol>
			<li>A confirmation email has been sent to your email address.</li>
			<li>Your order will be processed as soon as you have made payment.</li>
			<li>Send to M-Pesa: <strong><u><?php echo $this->config->item('phone1'); ?></u></strong> 
				or call us on the same number.</li>
		</ol>
		
		</div><br/><br/>
		<p>
			<?php echo anchor('products', 'Continue Shopping &rarr;', 
				array('class'=>'uibutton')); ?></p>
		
	</div>
<br class="cls"/>
</div><!--End midsection-->