<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examples extends CI_Controller {
	
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
		$this->data['header'] = "An Example Page";
		$this->load->helper("formatDate");
		$this->data['date'] = formatDate(time());//time() = unix timestamp of right now
		$this->data['date'] = formatDate(strtotime("next monday"));
		$this->load->view('template', $this->data);
	}
	public function helloWorld()
	{
		$this->data['header'] = "Hello World";
		$this->data['view'] = "HelloWorld";
		$this->load->view('template', $this->data);
	}
	public function myheader()
	{
		$this->load->view('examples/header');//we would get errors if loading this through the template
	}
	
	public function library()
	{
		$this->load->library("TestAPI");
		$this->testapi->aMethodInMyLibrary("a param");
		
		$this->load->library("TestAPI", NULL, "test");
		$this->test->aMethodInMyLibrary("a param");
		
		echo "<br>".$this->config->item("emailFrom");
	}
	public function listUsers()
	{
		//loading and calling a model function
		$this->load->model("users_model");
		$this->data['users'] = $this->users_model->getAllUsers();
		
		//basic pieces to load a page
		$this->data['header'] = "User Listing";
		$this->data['view'] = "examples/userListing";
		$this->load->view('template', $this->data);
	}
	public function listSomeUsers()
	{
		//loading and calling a model function
		$this->load->model("users_model");
		$this->data['users'] = $this->users_model->getUsers($this->uri->segment(3));
		
		//basic pieces to load a page
		$this->data['header'] = "Partial User Listing";
		$this->data['view'] = "examples/userListing";
		$this->load->view('template', $this->data);
	}
}
