<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

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
		if($this->session->has_userdata("RoleNames") && in_array("Admin", $this->session->userdata("RoleNames")))
		{
				$this->Tools();
		}
		else
		{
			redirect("authentication/Login");
		}
	}
	
	public function Tools()
	{
		if($this->session->has_userdata("RoleNames") && in_array("Admin", $this->session->userdata("RoleNames")))
		{
				
				
			$this->data = array(
				'view' => "AdminTools/Tools"
			);
			$this->load->view('template', $this->data);
				
		}
		else
		{
			redirect("authentication/Login");
		}
	}
	
	public function users()
	{
		if($this->session->has_userdata("RoleNames") && in_array("Admin", $this->session->userdata("RoleNames")))
		{
				$this->load->model("Users_Model");
		
			$name; $email; $username; $ID;
		
			$Users = $this->Users_Model->getAllUsers();
			foreach ($Users as $row)
			{
				$name[] = $row->FirstName." ".$row->LastName; 
				$email[] = $row->Email; 
				$username[] = $row->Username; 
				$ID[] = $row->UserID;
			}
			$this->data = array(
				'view' => "AdminTools/users",
				'Name' => $name,
				'Email' => $email,
				'Username' => $username,
				'UserID' =>  $ID
			);

			$this->load->view('template', $this->data);
				
		}
		else
		{
			redirect("authentication/Login");
		}
	}
	
	public function exercises()
	{
		if($this->session->has_userdata("RoleNames") && in_array("Admin", $this->session->userdata("RoleNames")))
		{
			$this->load->model("Exercise_Model");
		
			$name; $group; $difficulty; $ID;
		
			$Exs = $this->Exercise_Model->getAllExercises();
			foreach ($Exs as $row)
			{
				$name[] = $row->exerciseName; 
				$group[] = $row->muscleGroup; 
				$difficulty[] = $row->level; 
				$ID[] = $row->exerciseID;
			}
			$this->data = array(
				'view' => "AdminTools/exercises",
				'Name' => $name,
				'MuscleGroup' => $group,
				'Level' => $difficulty,
				'ExerciseID' =>  $ID
			);
			$this->load->view('template', $this->data);
				
		}
		else
		{
			redirect("authentication/Login");
		}
	}
}