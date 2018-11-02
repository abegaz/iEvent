<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('formatDate'))
{
	function formatDate($timestamp)
	{
		//$CI =& get_instance();//used if you need to access the CI object structure from inside the helper
		return date('Y-d-m H:i:s', $timestamp);
	}
}

if(!function_exists("anotherFunction"))
{
	function anotherFunction()
	{
		$CI =& get_instance();//forces pass by reference instead of a copy of the object
		$CI->load->view("menu");
	}
}