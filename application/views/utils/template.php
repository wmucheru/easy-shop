<?php
	/*
	 * Template carries header, footer, and common navigations
	 * */
	$this->load->view('utils/header');
	$this->load->view($page_content);
	$this->load->view('utils/footer');
?>