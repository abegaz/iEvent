<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Emails extends CI_Controller {

	private $data;
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>