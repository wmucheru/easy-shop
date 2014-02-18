<div class="main_holder">
  <div class="box-grid1">
	  <div class="container">
	  	<h3>ADMISSION to JUNIOR HEARTS ACADEMY</h3>
	  	<p>To register your child for admission at our institution, please in the form 
	  		below:</p><br/><br/>
		
		<div class="container">
		<?php // Change the css classes to suit your needs
			echo validation_errors('<h3>','</h3>');
		
			$attributes = array('class' => 'form', 'id' => 'regform');
			echo form_open('admission/register_exec', $attributes);
		?>			
			<fieldset>
			<legend>Child's Details</legend>
			
			<table class="formtable" id="regform">
			<tr>
				<td width="33%">
			        <label for="child_fname">First Name of Child <span class="required">*</span></label>
			        <?php echo form_error('child_fname'); ?>
			        <br/><input id="child_fname" type="text" name="child_fname" maxlength="54" 
			        	value="<?php echo set_value('child_fname'); ?>"/>
				</td>
				<td width="33%">
					<label for="child_mname">Middle Name <span class="required">*</span></label>
			        <?php echo form_error('child_mname'); ?>
			        <br /><input id="child_mname" type="text" name="child_mname" maxlength="64" 
			        	value="<?php echo set_value('child_mname'); ?>"/>
				</td>
				<td width="33%">
					<label for="child_surname">Surname <span class="required">*</span></label>
			        <?php echo form_error('child_surname'); ?>
			        <br /><input id="child_surname" type="text" name="child_surname" maxlength="64" 
			        	value="<?php echo set_value('child_surname'); ?>"  />
				</td>
			</tr>
			<tr>
				<td colspan="3">
			        <label for="child_dob">Date of Birth</label>
			        <?php echo form_error('child_dob'); ?>
			        <br /><input id="child_dob" type="text" name="child_dob" maxlength="64" 
			        	value="<?php echo set_value('child_dob'); ?>"/>
				</td>
			</tr>
			
			<tr>
				<td width="33%">
					<label for="child_sex">Sex <span class="required">*</span></label>
			        <?php echo form_error('child_sex'); ?>
			        
			        <?php // Change the values in this array to populate your dropdown as required ?>
			        <?php $options = array( ''  => 'Please Select',
							'Male' => 'Male', 'Female' => 'Female'); 
					?>
			        <br /><?php echo form_dropdown('child_sex', $options, set_value('child_sex'))?>
				</td>
				<td width="33%">
					<label for="nationality">Nationality <span class="required">*</span></label>
			        <?php echo form_error('nationality'); ?>
			        <br /><input id="nationality" type="text" name="nationality" maxlength="64" 
			        	value="<?php echo set_value('nationality'); ?>"  />
				</td>
				<td width="33%">
					<label for="religion">Religion <span class="required">*</span></label>
			        <?php echo form_error('religion'); ?>
			        <br /><input id="religion" type="text" name="religion" maxlength="64" 
			        	value="<?php echo set_value('religion'); ?>"  />
				</td>
			</tr>
			<tr>
				<td colspan="3">
			        <label for="prev_school">Previous School <span class="required">*</span></label>
			        <?php echo form_error('prev_school'); ?>
			        
			        <br /><?php echo form_textarea( array( 'name' => 'prev_school', 'rows' => '5', 'cols' => '40', 
						'value' => set_value('prev_school'))); ?>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<label for="child_level">Class Level <span class="required">*</span></label>
        <?php echo form_error('child_level'); ?>
        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array('' => 'Please Select', 'Baby Class: 1 1/2-3years' => 'Baby Class: 1 1/2 - 3 years', 
        	'KG1: 3-4 years' => 'KG1: 3 - 4 years', 'KG2: 4-5 years' => 'KG2: 4 - 5 years', 
        	'Pre-Unit: 5-6 years' => 'Pre-Unit: 5 - 6 years', 'Primary' => 'Primary'); ?>

        <br /><?php echo form_dropdown('child_level', $options, set_value('child_level'))?>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<label for="school_time">School Time <span class="required">*</span></label>
			        <?php echo form_error('school_time'); ?>

			        <?php $options = array('' => 'Please Select', 'Half Day (8:00 - 12:30)' => 'Half Day (8:00 - 12:30)', 
			        	'Full Day (8:00 - 3:30)' => 'Full Day (8:00 - 3:30)', 
			        	'Lunch Only' => 'Lunch Only'); ?>
			        <br /><?php echo form_dropdown('school_time', $options, set_value('school_time'))?>
				</td>
			</tr>
			</table>
			
			</fieldset>
			
			
			<fieldset>
			<legend>Mother/Guardian Details <span class="">* Where applicable</span></legend>

			<table class="formtable" id="regform">
			<tr>
				<td width="33%">
			        <label for="mother_fname">Mother's Name <span class="required">*</span></label>
			        <?php echo form_error('mother_fname'); ?>
			        <br /><input id="mother_fname" type="text" name="mother_fname" maxlength="64" 
			        	value="<?php echo set_value('mother_fname'); ?>"/>
				</td>
				<td width="33%">
			        <label for="mother_mname">Mother's Middle Name <span class="required">*</span></label>
			        <?php echo form_error('mother_mname'); ?>
			        <br /><input id="mother_mname" type="text" name="mother_mname" maxlength="64" 
			        	value="<?php echo set_value('mother_mname'); ?>"/>
				</td>
				<td width="33%">
			        <label for="mother_lname">Mother's Last Name <span class="required">*</span></label>
			        <?php echo form_error('mother_lname'); ?>
			        <br /><input id="mother_lname" type="text" name="mother_lname" maxlength="64" 
			        	value="<?php echo set_value('mother_lname'); ?>"/>
				</td>
			</tr>			
			<tr>
				<td width="33%">
					<label for="mother_email">Mother's Email <span class="required">*</span></label>
					<?php echo form_error('mother_email'); ?>
					<br /><input id="mother_email" type="text" name="mother_email" maxlength="128" 
						value="<?php echo set_value('mother_email'); ?>"/>
				</td>
				<td width="33%">
					<label for="mother_telephone_no">Mother Telephone No. <span class="required">*</span></label>
					<?php echo form_error('mother_telephone_no'); ?>
					<br /><input id="mother_telephone_no" type="text" name="mother_telephone_no" maxlength="32" 
						value="<?php echo set_value('mother_telephone_no'); ?>"/>
				</td>
				<td width="33%">
					<label for="mother_mobile_no">Mother Mobile No. <span class="required">*</span></label>
					<?php echo form_error('mother_mobile_no'); ?>
					<br /><input id="mother_mobile_no" type="text" name="mother_mobile_no" maxlength="32" 
						value="<?php echo set_value('mother_mobile_no'); ?>"/>
				</td>
			</tr>
			<tr>
				<td width="33%">
					<label for="mother_occupation">Mother's Occupation <span class="required">*</span></label>
					<?php echo form_error('mother_occupation'); ?>
					<br /><input id="mother_occupation" type="text" name="mother_occupation" maxlength="128" 
						value="<?php echo set_value('mother_occupation'); ?>"/>
				</td>
				<td colspan="2" width="67%">
					<label for="mother_employer">Mother's Employer <span class="required">*</span></label>
					<?php echo form_error('mother_employer'); ?>
					<br /><input id="mother_employer" type="text" name="mother_employer" maxlength="128" 
						value="<?php echo set_value('mother_employer'); ?>"/>
				</td>
			</tr>
			</table>
			</fieldset>
			
			<fieldset>
			<legend>Father/Guardian Details <span class="">* Where applicable</span></legend>
			
			<table class="formtable" id="regform">
			<tr>
				<td width="33%">
						<p>
			        <label for="father_fname">Father's First Name <span class="required">*</span></label>
			        <?php echo form_error('father_fname'); ?>
			        <br /><input id="father_fname" type="text" name="father_fname" maxlength="64" 
			        	value="<?php echo set_value('father_fname'); ?>"/>
				</td>
				<td width="33%">
			        <label for="father_mname">Father's Middle Name <span class="required">*</span></label>
			        <?php echo form_error('father_mname'); ?>
			        <br /><input id="father_mname" type="text" name="father_mname" maxlength="64" 
			        	value="<?php echo set_value('father_mname'); ?>"/>
				</td>
				<td width="33%">
			        <label for="father_lname">Father's Last Name <span class="required">*</span></label>
			        <?php echo form_error('father_lname'); ?>
			        <br /><input id="father_lname" type="text" name="father_lname" maxlength="64" 
			        	value="<?php echo set_value('father_lname'); ?>"/>
				</td>
			</tr>
			<tr>
				<td width="33%">
			        <label for="father_email">Father's Email <span class="required">*</span></label>
			        <?php echo form_error('father_email'); ?>
			        <br /><input id="father_email" type="text" name="father_email" maxlength="128" 
			        	value="<?php echo set_value('father_email'); ?>"/>
				</td>
				<td width="33%">
			        <label for="father_telephone_no">Father Telephone No. <span class="required">*</span></label>
			        <?php echo form_error('father_telephone_no'); ?>
			        <br /><input id="father_telephone_no" type="text" name="father_telephone_no" maxlength="32" 
			        	value="<?php echo set_value('father_telephone_no'); ?>"/>
				</td>
				<td width="33%">
			        <label for="father_mobile_no">Father Mobile No. <span class="required">*</span></label>
			        <?php echo form_error('father_mobile_no'); ?>
			        <br /><input id="father_mobile_no" type="text" name="father_mobile_no" maxlength="32" 
			        	value="<?php echo set_value('father_mobile_no'); ?>"/>
				</td>
			</tr>
			<tr>
				<td width="33%">
			        <label for="father_occupation">Father's Occupation <span class="required">*</span></label>
			        <?php echo form_error('father_occupation'); ?>
			        <br /><input id="father_occupation" type="text" name="father_occupation" maxlength="128" 
			        	value="<?php echo set_value('father_occupation'); ?>"/>
				</td>
				<td colspan="2" width="67%">
					<label for="father_employer">Father's Employer <span class="required">*</span></label>
			        <?php echo form_error('father_employer'); ?>
			        <br /><input id="fathers_employer" type="text" name="father_employer" maxlength="128" 
			        	value="<?php echo set_value('father_employer'); ?>"/>
				</td>
			</tr>
			</table>
			</fieldset>

			<fieldset>
			<legend>Postal Details</legend>
			
			<table class="formtable" id="regform">
			<tr>
				<td colspan="3">
					<label for="residential_addr">Detailed Residential Address <span class="required">*</span></label>
					<?php echo form_error('residential_addr'); ?>
					<br /><?php echo form_textarea( array( 'name' => 'residential_addr', 'rows' => '5', 'cols' => '40', 
						'value' => set_value('residential_addr'))); ?>
				</tr>
			</tr>
			<tr>
				<td width="33%">
			        <label for="postal">P.O. Box <span class="required">*</span></label>
					<?php echo form_error('postal'); ?>
					<br/><?php echo form_textarea( array( 'name' => 'postal', 'rows' => '5', 'cols' => '40', 
						'value' => set_value('postal') ) )?>
				</td>
				<td width="33%">
					<label for="city">City <span class="required">*</span></label>
			        <?php echo form_error('city'); ?>
			        <br/><input id="city" type="text" name="city" maxlength="64" 
			        	value="<?php echo set_value('city'); ?>"/>
				</td>
				<td width="33%">
					<label for="city">Country <span class="required">*</span></label>
			        <?php echo form_error('country'); ?>
			        <br/><input id="country" type="text" name="country" maxlength="64" 
			        	value="<?php echo set_value('country'); ?>"/>
				</td>
			</tr>
			</table>
			</fieldset>
        

			<fieldset>
			<legend>Medical Details</legend>
			<table class="formtable" id="regform">
			<tr>
				<td colspan="3">
					<p><label for="child_allergies"><span class="required">*</span> 
						Does your child have any known allergies?</label>
			        	<?php echo form_error('child_allergies'); ?>
				        Yes <input type="radio" name="child_allergies" value="No"/>
				        No <input type="radio" name="child_allergies" value="Yes"/></p><br/>
					
					<p><label for="alergy_text">State The alergy <span class="required">*</span></label>
					<?php echo form_error('alergy_text'); ?>
					<br/><?php echo form_textarea( array( 'name' => 'alergy_text', 'rows' => '5', 'cols' => '80', 
						'value' => set_value('alergy_text') ) )?></p><br/>
				</td>
			</tr>
			<tr>
				<td width="50%">
					<label for="family_doctor">Name of Family Doctor</label>
			        <?php echo form_error('family_doctor'); ?>
			        <br /><input id="family_doctor" type="text" name="family_doctor" maxlength="128" 
			        	value="<?php echo set_value('family_doctor'); ?>"/>
				</td>
				<td width="50%">
					<label for="doctor_phone">Doctor Phone <span class="required">*</span></label>
			        <?php echo form_error('doctor_phone'); ?>
			        <br /><input id="doctor_phone" type="text" name="doctor_phone" 
			        	value="<?php echo set_value('doctor_phone'); ?>"  />
				</td>
			</tr>
			</table>
			</fieldset>
			
			<p>
			<?php 
	        	echo form_submit( 'submit', 'Submit Application');
	        	echo form_close(); 
	        ?>
			</p>
		</div>
		
	<div class="cls"> </div>
	</div>
  </div>
	
  <div class="right_column">
    
  </div>
<div class="cls"> </div>
</div>