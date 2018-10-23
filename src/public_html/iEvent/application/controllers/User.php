<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		if($this->session->has_userdata("userID") && is_numeric($this->session->userdata("userID")) && $this->session->has_userdata("RoleNames"))
		{
			if(in_array("User", $this->session->userdata("RoleNames")))
			{
				$this->user($this->session->has_userdata("FirstName"));
			}
			else
			{
				echo "<script>alert('Oops! You got to the wrong page! Redirecting now.')</script>";
				if(in_array("Trainer", $this->session->userdata("RoleNames")))
				{
					redirect("Trainer");
				}
				else if(in_array("Admin", $this->session->userdata("RoleNames")))
				{
					redirect("Admin");
				}
				else 
				{
					redirect("authentication/login");
				}
			}
		}
		else
		{
			redirect("authentication/login");
		}
	}
	
	public function user($name)
	{
		$this->data = array(
			'view' => "Calculators/bmi"
			);
		$this->load->view('template', $this->data);
	}
}