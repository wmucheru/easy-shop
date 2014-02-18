<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo isset($pg_title)? $pg_title: '';?> : Honest Industries Ltd.</title>
	
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="description" content=""/>
<meta name="keywords" content="Soap"/>
<meta name="author" content="Honest Industries Ltd."/>

<link href="<?php echo base_url();?>css/reset.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>css/style2.css" rel="stylesheet" type="text/css"/>
<link rel="icon" href="<?php echo base_url();?>images/favicon.ico"/>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>

</head>
<body id="<?php echo isset($body_id)? $body_id: '';?>">
<div id="wrapper">
<div id="header">
	<p class="text-center" id="navbar_top">
		<a href="<?php echo base_url();?>"><img id="hop_logo" src="<?php echo base_url();?>images/HOP_logo.png"/></a>
	</p>
<br class="cls"/>
</div>
<?php $this->load->view('utils/topNav'); ?>

