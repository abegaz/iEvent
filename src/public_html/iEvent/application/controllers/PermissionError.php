<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PermissionError extends CI_Controller {

	private $data;
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->session->has_userdata("userID") && is_numeric($this->session->userdata("userID")))
		{
			echo "<script>alert('Oops! You seem to have reached a page you weren't supposed to. \nWe've taken you back to your profile.</script>";
		
		redirect("Profile");
		}
		else
		{
			echo "<script>alert('Oops! You seem to have reached a page you weren't supposed to. \nWe've taken you back to the login page.</script>";
			redirect("authentication/Login");
		}
		
	}
}