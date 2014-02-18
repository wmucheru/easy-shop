<div class="status-msg" width="100%">
<?php
	
	if($this->session->userdata('success_msg') || $this->session->userdata('error_msg')){
	 	if($this->session->userdata('success_msg')){
			echo '<li class="success">'.$this->session->userdata('success_msg').'</li>';
			$this->session->unset_userdata('success_msg');
	 	}
		
		if($this->session->userdata('error_msg')){
			echo '<li class="error">'.$this->session->userdata('error_msg').'</li>';
			$this->session->unset_userdata('error_msg');
	 	}
	}
	echo validation_errors('<li class="error">', '</li>');
?>
<div class="cls"> </div>
</div>