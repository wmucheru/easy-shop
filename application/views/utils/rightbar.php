	
	<!--Nav-->
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


	<div id="navigation" class="container">
		<p>
<!-- LiveZilla Chat Button Link Code (ALWAYS PLACE IN BODY ELEMENT) --><a href="javascript:void(window.open('http://hortbizea.com/livechat/chat.php','','width=590,height=725,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))"><img src="http://hortbizea.com/livechat/image.php?id=03&amp;type=inlay" width="200" height="55" border="0" alt="LiveZilla Live Help" /></a><!-- http://www.LiveZilla.net Chat Button Link Code --><!-- LiveZilla Tracking Code (ALWAYS PLACE IN BODY ELEMENT) --><div id="livezilla_tracking" style="display:none"></div><script type="text/javascript">
/* <![CDATA[ */
var script = document.createElement("script");script.async=true;script.type="text/javascript";var src = "http://hortbizea.com/livechat/server.php?request=track&output=jcrpt&nse="+Math.random();setTimeout("script.src=src;document.getElementById('livezilla_tracking').appendChild(script)",1);
/* ]]> */
</script><noscript><img src="http://hortbizea.com/livechat/server.php?request=track&amp;output=nojcrpt" width="0" height="0" style="visibility:hidden;" alt="" /></noscript><!-- http://www.LiveZilla.net Tracking Code -->		</p>
		<p id="message">
		Get great deals for bulk and retail purchase of Kenya�s best produce!
		</p>
		
		<div id="nav_shopping_cart" class="nav_holder">
			<div class="box_header">Shopping Cart
			<span class="nav_header_link">
			<?php echo anchor('cart/', 'Open cart', array('title'=>
			'View shopping cart', 'id'=>'view_cart_link')); ?></span>
			</div>
			<div class="nav_containers scroll-pane" 
				style="border-bottom:1px solid #AFAFAF;height:200px;">
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
			<div><p> 
			<?php 
				echo " Total = <span style='font-weight:bold;
				font-size:16px;'>KES. ".$this->cart->total()."</span>";
				echo anchor('cart/checkout', 
					'Checkout Now', array('id'=>'checkout_but', 'class'=>'ui_button',
					'title'=>'Proceed to pay')); 
			?> </p>
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<div id="nav_contacts" class="nav_holder">
			<div class="box_header">Our Contacts for any enquiries</div>
			<ul>
				<li>Phone: <strong><?php echo $this->config->item('phone1'); ?></strong></li>
				<li>Email: <strong><a href="<?php echo $this->config->item('email1'); ?>">
						<?php echo $this->config->item('email1'); ?></a></strong></li>
			</ul>
			
		</div>
		<div style="clear:both;"></div>
	</div>