<div id="midsection">
	<div class="box-grid34" id="midbox">
		<!-- <h1>Our Products</h1> -->
		<?php 
			$this->load->view('utils/status');
			
			/* GENERATE THIS DYNAMICALLY */
			// foreach($products as $pr){
				
			// }
		
			$categories = $this->products_model->getAllCategories();
			//var_dump($categories);
			
			//Foreach category generate its products
			foreach($categories as $ct){
				$cat_id = $ct->id;
				$cat_name = $ct->name;
		?>
		
		<?php
				
				echo '<div class="box-grid1">
					<h2>'.$cat_name.'</h2>
					</div>';
				
				//Get the products under each
				$products = $this->products_model->getCategoryItems($cat_id);
				//var_dump($products);
				
				foreach($products as $pd){
					$p_id = $pd->id;
					$cat_id = $pd->category_id;
					$p_name = $pd->name;
					$p_unit = $pd->unit;
					$p_qty = $pd->quantity;
					$p_price = $pd->price;
					$p_desc = $pd->description;
					$p_img = $pd->image;
					/*
					 *    public 'id' => string '4' (length=1)
					      public 'category_id' => string '2' (length=1)
					      public 'name' => string 'Neem Perfumed Soap' (length=18)
					      public 'unit' => string 'Box' (length=3)
					      public 'quantity' => string '20' (length=2)
					      public 'price' => string '2300.00' (length=7)
					      public 'description' => string 'Neem Perfumed Soap' (length=18)
					      public 'image' => string 'neem-perfumed-soap.png' (length=22)
					      public 'option_name' => null
					      public 'option_values' => null
					 * 
					 * */
			?>
			
			<div class="product_box">
				<a class="prod" href="<?php echo site_url('products/view/'.$p_id)?>">
					<img src="<?php echo base_url('images/products/'.$p_img); ?>" alt="<?php echo $p_name; ?>"/>
				</a>
				<p class="pricebox">
					<a class="prod" href="<?php echo site_url('products/view/1')?>"><?php echo $p_name; ?></a>
					<br/>Ksh. <?php echo $p_price .' - '."(".$p_qty."kg ".$p_unit.")"; ?><br/> 
					<a href="<?php echo site_url('products/view/'.$p_id)?>">Add to Cart</a>
				</p>
			</div>
			
			<?php	
				}//End product foreach
			}//End category foreach
		?>
	</div>
	
	<?php $this->load->view('utils/rightnav'); ?>
<br class="cls"/>
</div><!--End midsection-->