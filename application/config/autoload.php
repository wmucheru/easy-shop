<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('session', 'form_validation', 'email', 
		'cart', 'pagination', 'database', 'pagination', 'user_agent', 'breadcrumb');

$autoload['helper'] = array('url', 'file', 'form', 'html');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('function_model', 'mynotes_model', 'products_model');
