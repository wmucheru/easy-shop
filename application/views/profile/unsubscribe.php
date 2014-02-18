	<?php echo $this->load->view('utils/topNav_terms'); ?>
    
    <div class="box-grid1 formbox termbox pagebox-wide"><br/>
		<h3><?php echo $pg_title; ?></h3>
		
		<p><br/>Enter your email address and unsubscribe from our alerts<br/><br/>
	<?php 
		echo form_open('authorise/unsub_exec');
		$this->function_model->show_error('');
		
		echo 'Email Address '.form_input(array('name'=>'unsub_email','style'=>'width:28em;')).' ';
		echo form_submit(array('value'=>'Unsubscribe'));
		
		echo form_close(); 
	?>
	</div>
	
	<div class="pagebox-nav">
		
	</div>