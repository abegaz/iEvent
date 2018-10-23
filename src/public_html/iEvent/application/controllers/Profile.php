<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
			$this->viewProfile();
		}
		else
		{
			redirect("authentication/login");
		}
	}
	
	public function loadProfile()
	{
		
	}
	public function viewProfile()
	{
		$this->loadProfile();
		if($this->session->has_userdata("userID") && is_numeric($this->session->userdata("userID")))
		{
			$this->data = array(
				'view' => "iEvent-profile",
			);
			$this->load->view('template', $this->data);
		}
		else
		{
			redirect("authentication/login");
		}
	}
}