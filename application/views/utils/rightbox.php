<div id="rightbox">
	<div class="boxright">
        <div class="headerbox">Login</div>
        
		<?php $this->load->view('utils/form_login'); ?>
    </div>

    <div class="boxright">
        <div class="headerbox">Register</div>
        <p>
            Create an account for your company to add 
			tenders and to apply for tenders.<br/><br/>
            <a class="uibutton" href="<?php echo site_url('authorise/register'); ?>">Register</a><br/><br/>
        </p>
    </div>
</div>