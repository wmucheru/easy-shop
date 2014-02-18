<div id="midsection">
	<div class="box-grid1" id="midbox">
		<div class="box-grid3">
			<h1>Contact Us</h1>
			
			<form action="" method="post" accept-charset="utf-8">
				<div>
					<label>Your Name:</label><br>
					<input type="text" name="yname" value="">
				</div>
				
				<div>
					<label>Email:</label><br>
					<input type="text" name="email" value="">
				</div>
				
				<div>
					<label>Telephone:</label><br>
					<input type="text" name="telephone" value="">
				</div>
				
				<div>
					<label>Message:</label><br>
					<textarea name="message" rows="8" cols="30"></textarea>
					<p>
						<input type="submit" name="cont_submit" value="Send Message">
					</p>
				</div>
			</form>
		</div>
		
		<div class="box-grid3 text-center" style="margin-top:8em;margin-left:2em;">
			<h3>Contacts</h3>
			In case you need details or want more information, contact us:
			
			<br/><br/>
			<ul>
				<li><strong><?php echo $this->config->item('phone1'); ?></strong></li>
				<li><strong><a href="mailto:<?php echo $this->config->item('email1'); ?>">
					<?php echo $this->config->item('email1'); ?></a></strong></li>
			</ul>
			<br/>
		</div>
		
		<div class="box-grid3">
			<h3>Location from Google Maps</h3>
			<div id="map">
				<iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" 
				marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Junior+Hearts+Academy,+Mubiru+Road,+Nairobi,+Kenya&amp;aq=0&amp;oq=junior+heart&amp;sll=37.0625,-95.677068&amp;sspn=39.320439,60.117188&amp;ie=UTF8&amp;hq=&amp;hnear=&amp;ll=-1.313632,36.835703&amp;spn=0.006295,0.006295&amp;t=m&amp;output=embed"></iframe><br><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Junior+Hearts+Academy,+Mubiru+Road,+Nairobi,+Kenya&amp;aq=0&amp;oq=junior+heart&amp;sll=37.0625,-95.677068&amp;sspn=39.320439,60.117188&amp;ie=UTF8&amp;hq=&amp;hnear=&amp;ll=-1.313632,36.835703&amp;spn=0.006295,0.006295&amp;t=m" style="color:#0000FF;text-align:left">View Larger Map</a></small>
			</div>
		</div>
	</div>
<br class="cls"/>
</div><!--End midsection-->
