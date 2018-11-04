<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->data['view'] = "Homepage";
		$this->load->view('template', $this->data);
		/*
		if(!($this->session->has_userdata("userID") && is_numeric($this->session->userdata("userID"))))
		{
		$this->data['view'] = "LoginView";
		if($this->input->post("Login"))
		{
			$this->load->model("Users_Model");
			$this->form_validation->set_rules("Username", "Username", "required|min_length[3]");
			$this->form_validation->set_rules("Password", "Password", "required|min_length[8]|callback_authenticate");
			if($this->form_validation->run() === FALSE)
			{
				//failed a rule
			}
			else
			{
				//passed all rules
				$this->data['userID'] = $this->Users_Model->getUserID($this->input->post("Username"));
				
				//write some session data for the logged in user
				$this->session->set_userdata("userID", $this->data['userID']);
				
				//returns a row object about the logged in user
				$userInfo = $this->Users_Model->getUserInfo($this->data['userID']);
				$this->session->set_userdata("FirstName", $userInfo->FirstName);
				$this->session->set_userdata("LastName", $userInfo->LastName);
				
				$roles = $this->Users_Model->getUserRoles($this->data['userID']);
				if(count($roles) > 0)
				{
					foreach($roles as $row)
					{
						$roleIDs[] = $row->RoleID;
						$roleNames[] = $row->RoleName;
					}
					$this->session->set_userdata("RoleIDs", $roleIDs);
					$this->session->set_userdata("RoleNames", $roleNames);
				}
				
				$this->session->set_flashdata("message", "Logged in successfully!");
				redirect("Profile");
			}
		}
		else if($this->input->post("createUser"))
		{
			redirect("authentication/Register");
		}
		
		$this->load->view("LoginView");
		}
		*/
	}
	public function demo()
	{
		$this->data['view'] = "HelloWorld";
		$this->load->view('template', $this->data);		
	}
	
	public function authenticate($password)
	{
		$username = $this->input->post("Username");
		$password = hash("sha512",$password.$this->config->item('salt'));
		
		if(!$this->Users_Model->login($username, $password))
		{
			$this->form_validation->set_message("authenticate", "Incorrect username or password.");
			return false;
		}
		return true;
	}
}
