<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
	
	private $data;
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if($this->session->has_userdata("userID") && is_numeric($this->session->userdata("userID")))
		{
			redirect('/profile');
		}
		else
		{
			redirect("authentication/login");
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("authentication/login");
	}
	
	public function login()
	{
		//prevent page from loading if already logged in
		if($this->session->has_userdata("userID") && is_numeric($this->session->userdata("userID")))
		{
			redirect("/");
		}
		$this->load->library('recaptcha');
		$this->recaptcha->set_parameter('theme', 'dark');
		
		
		$this->data['view'] = "LoginView";

		if($this->input->post("Login"))
		{
			$this->load->model("Users_Model");
			
			//Validates our login form
			$this->form_validation->set_rules("Username", "Username", "required|min_length[3]");
			$this->form_validation->set_rules("Password", "Password", "required|min_length[8]|callback_authenticate");
			$this->form_validation->set_rules("Cap", "Cap", "callback_authenticateCAP");
			
			if($this->form_validation->run() === TRUE)
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
			else
			{
				//failed a rule
			}
		}
		else if($this->input->post("createUser"))
		{
			redirect("authentication/Register");
		}
		
		
		$this->data['header'] = "Log In";
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
	public function authenticateCAP()
	{
		$response = $this->recaptcha->is_valid(NULL, NULL);
		if (!($response['success'] == TRUE))
		{
			$this->form_validation->set_message("authenticateCAP", "Please complete the reCAPTCHA.");
			return false;
		}
		return true;
	}
	
	public function Register()
	{
		//prevent page from loading if already logged in
		if($this->session->has_userdata("userID") && is_numeric($this->session->userdata("userID")))
		{
			redirect("/");
		}
		
		$this->load->library('recaptcha');
		$this->recaptcha->set_parameter('theme', 'dark');
		
		//at the top so it can be overriden by successful form submission
		$this->data['view'] = "createUser";
		
		if($this->input->post("MySubmit"))
		{
			//fieldName, userFriendlyName, Rules
			$configArray = array(
				array(
					'field' => 'FirstName', 
					'label' => 'First Name', 
					'rules' => 'required',
					'errors' => array(
							'required'  => 'You must provide a %s.',
								),
				),
				array(
					'field' => 'LastName', 
					'label' => 'Last Name', 
					'rules' => 'required',
					'errors' => array(
							'required'  => 'You must provide a %s.',
								),
				
				),
				array(
					'field' => 'Username', 
					'label' => 'Username', 
					'rules' => 'required|min_length[3]|is_unique[Users.Username]',
					'errors' => array(
							'required'  => 'You must provide a %s.',
							'min_length' => 'Username must be at least 3 characters long.',
							'is_unique' => 'This username is already in use.'
								),
				
				),
				array(
					'field' => 'Email', 
					'label' => 'Email', 
					'rules' => 'required|valid_email|is_unique[Users.Email]',
					'errors' => array(
							'required'  => 'You must provide an %s.',
							'valid_email' => 'Please provide a valid email address.',
							'is_unique' => 'This email is already in use'
								),
				
				),
				array(
					'field' => 'Password', 
					'label' => 'Password', 
					'rules' => 'required|min_length[8]|callback_PasswordStrength',
					'errors' => array(
							'required'  => 'Please enter a %s.',
							'min_length' => 'Passwords must be at least 8 characters long.',
								),
				),
				array(
					'field' => 'PasswordConf', 
					'label' => 'Password Confirmation', 
					'rules' => 'required|matches[Password]',
					'errors' => array(
							'required'  => 'Please reenter your password.',
							'matches' => 'Please make sure your passwords match.',
								),
				),
			);
			
			$this->form_validation->set_rules($configArray);
			$this->form_validation->set_rules("Cap", "Cap", "callback_authenticateCAP");
			
			if($this->form_validation->run() === FALSE)
			{
				//failed a rule
			}
			else
			{
				//passed all rules
				$this->load->model("Users_Model");
				
				if(is_array($this->input->post("Taken")))
					$taken = implode(";",$this->input->post("Taken"));
				else
					$taken = "";
				
				$this->data['userID'] = $this->Users_Model->createUser(
					$this->input->post("FirstName"),
					$this->input->post("LastName"), 
					$this->input->post("Username"), 
					$this->input->post("Email"), 
					hash("sha512",$this->input->post("Password").$this->config->item('salt'))
					);
				
				$this->Users_Model->assignRole($this->data['userID'], $this->config->item("defaultRoleID"));
				
				$this->session->set_flashdata("message", "User account created succesfully!");
				redirect("/");
			}
		}
		
		//basic pieces to load a page
		$this->data['header'] = "Create User";
		
		$this->load->view('template', $this->data);
	}
	public function PasswordStrength($password)
	{
		if(is_numeric($password) && preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password))
		{
			$this->form_validation->set_message("PasswordStrength", "The given password is not strong enough.\nPasswords must contain at least 8 characters,\nand at least one of the following: uppercase letter, lowercase letter, number, and special character.");
			return false;
		}
		return true;
	}
	
	public function securimage() 
	{
		$this->load->library('securimage');
		$img = new Securimage();
		$img->show(); // alternate use: $img->show('/path/to/background.jpg');
	}
}

?>