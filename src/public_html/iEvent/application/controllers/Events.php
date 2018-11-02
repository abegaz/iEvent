<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

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
			redirect('Events/YourEvents');
		}
		else
		{
			redirect("Events/AllEvents");
		}
	}
	
	public function YourEvents()
	{
		if($this->session->has_userdata("userID") && is_numeric($this->session->userdata("userID")))
		{
			$userID = $this->session->userdata("UserID");
			$this->load->model("Users_Model");
			$this->load->model("Events_Model");
			$eIDs = $this->Events_Model->getAllAttachedEvents($this->session->userdata("userID"));
			
			$eventName; $privacy; $StartTime; $EndTime; $Summary;
			if(count($eIDs) != 0)
			{
				foreach ($eIDs as $row)
				{
					$info = $this->Events_Model->getEventsInfo($row->EventID);
					
					$eventName[] = $info->EventName;
					$privacy[] = $info->Privacy;
					$StartTime[] = $info->StartTime;
					$EndTime[] = $info->EndTime;
					$Summary[] = $info->Summary;
				}
				$this->data = array(
					'EventName' => $eventName, 
					'Privacy' => $privacy, 
					'StartTime' => $StartTime, 
					'EndTime' => $EndTime, 
					'Summary' => $Summary
				);

			}
			$this->data['view'] = "Events/List";
			$this->load->view('template', $this->data);
		}
	
	}
	
	public function CreateEvent()
		{
			if($this->session->has_userdata("userID") && is_numeric($this->session->userdata("userID")))
		{
			$this->data = array(
			'view' => "createEvent",
			);
		//at the top so it can be overriden by successful form submission
		$this->data['view'] = "createEvent";
		
		if($this->input->post("MySubmit"))
		{
			//fieldName, userFriendlyName, Rules
			
			//passed all rules
			
			
			if(is_array($this->input->post("Taken")))
				$taken = implode(";",$this->input->post("Taken"));
			else
				$taken = "";
			$this->load->model("Events_Model");
			
			$this->data['EventID'] = $this->Events_Model->createEvent(
				$this->input->post("EventName"),
				$this->session->userdata("userID"),
				$this->input->post("privacy"), 
				$this->input->post("StartDate"), 
				$this->input->post("EndDate"), 
				$this->input->post("Summary") 
				);
			$this->load->model("Users_Model");
			$this->Events_Model->attachEvent($this->data['EventID'], $this->session->userdata('userID'));
			
			$this->session->set_flashdata("message", "Event created succesfully!");
			redirect("/");
		}
		
		//basic pieces to load a page
		$this->data['header'] = "Event Created";
		
		$this->load->view('template', $this->data);
		}
		else
		{
			redirect("Authentication/login");
		}
		}
		
		public function AllEvents()
		{
			redirect("Authentication/login");
		}
		
}