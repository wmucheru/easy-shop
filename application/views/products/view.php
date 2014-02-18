<div id="midsection">
	<div class="box-grid34" id="midbox">
		<a href="<?php echo site_url('products') ?>">&larr; Back to Products</a>
		<?php
			//Use passed id
			$prod = $array1;
			echo "<h1>Order for ".$prod->name."</h1>";
			//var_dump($prod);
			
			$this->load->view('utils/status');
		?>
		<div id="place_order_holder" class="box-grid1">
			<div class="box-grid2" id="make_order_image">
			<?php
				echo img(
					array(
						'src' => base_url().'images/products/'.
							$this->products_model->get_image($prod->image),
						'class' => 'make_order_image',
						'alt' => $prod->name
					));
				
			?>
			</div>
			<div class="box-grid2" id="make_order_details">
				<h3 style="margin-top:0;">Description:</h3>
				<p><?php echo $prod->description; ?></p><br/>
			<?php
				
				$category_id = $prod->category_id;
				
				/*
					If the category is special or for flowers, the customer should
					contact us directly
				*/
				if($category_id == 'Special'){
				
					//Contact info
					echo "<div style='border-top:1px solid #AFAFAF;font-size:14px;
						line-height:1.8em;'>
						This is a special order. Contact us for more information
						<ul>
							<li>Email: hortbizea@gmail.com</li>
							<li>Phone: +254 711 116 656</li>
						</ul>
						</div>";
				}
				else{
				
					echo "<h3>Quantity (each ".$prod->quantity."kg ".$prod->unit.
						" = KES. <span id='pricer'>".$prod->price."</span>)</h3><hr/>";
					
					//Echo out any validation errors
					echo validation_errors('<li class="error">', '</li>')."<br/>";
					
					//Form to sepcify amounts to be charged
					echo form_open('cart/add');
					echo form_hidden('id', $prod->id);
					
					$text = array(
						'id' => 'qty_box',
						'name' => 'qty_box',
						'maxlength' => '10',
						'autocomplete' => 'off',
						'style' =>'font-size:16px;font-weight:bold;width:60px;color:green;padding:4px;'
					);
					echo form_input($text);
					
					echo " <span style='font-size:14px;font-weight:bold;margin-right:30px;'>".
						" units</span>";
					
					echo form_submit('place_order', 'Add to Cart');
					echo form_close();
					
					echo "<div class='totals_holder'><hr/>
						<p><span class='totals'>Subtotal: </span><span id='subtler'>0</span></p></div>";
				}
			?>
			</div>
		</div>
	</div>
	
	<?php $this->load->view('utils/rightnav'); ?>
	
<br class="cls"/>
</div><!--End midsection-->