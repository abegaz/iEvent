<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Invites extends CI_Controller {

	private $data;
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function response()
	{
		#							URI-1    URI-2     URI-3        URI-4    URI-5
		#http://ievent.lemonhut.net/Invites/response/(INVITEEID)/(EVENTID)/(RSVP-ENUM)
		$this->load->model('Users_Model');
		$this->load->model('Events_Model');
		
		$userID = $this->uri->segment(3);
		$eID = $this->uri->segment(4);
		$eventName = $this->Events_Model->getEventName($this->uri->segment(4));
		$RSVP = $this->uri->segment(5);
		$currRSVP =$this->Events_Model->getUserResponse($userID, $eID);
		
		if ($RSVP == 4)
		{
			if($currRSVP[0]->RSVP != 'Yes')
			{
				$this->Events_Model->incrementAttendee($eID);
			}
			$this->Events_Model->setUserResponse($userID, $eID, $RSVP);
		}
		else
		{
			if($currRSVP[0]->RSVP == 'Yes')
			{
				$this->Events_Model->decrementAttendee($eID);
			}
			$this->Events_Model->setUserResponse($userID, $eID, $RSVP);
		}
		
		redirect('authentication/login');
	}
	
	public function send()
	{
		$this->load->model('Users_Model');
		$this->load->model('Events_Model');
		$users = $this->Users_Model->getAllUsers();
		$evs = $this->Events_Model->getAllUserEvents($this->session->userdata['userID']);
		
		$all = array();
		$events = array();
		
		foreach ($users as $val)
		{
			$info = array('Name' =>  $val->{'Username'}." (".$val->{'FirstName'}." ".$val->{'LastName'}.")", 
						  'Index' => $val->{'UserID'});
			array_push($all, $info);
		}
		
		foreach ($evs as $val)
		{
			array_push($events, $val->{'EventName'});
		}
		
		
		$this->data = array(
			'view' => "sendinvitations",
			'userEvents'=> $events,
			'allUsers' => $all
		);
		$this->load->view('template', $this->data);
		
		#Send out all of the Invites selected
		if($this->input->post("MySubmit"))
		{
			$this->load->model('Email_Model');
			$choices = $this->input->post("invite");
			$eID = $evs[$this->input->post("eventname")]->EventID;
			$pusher = array();
			
			#puts selected users into array
			foreach($choices as $i)
			{
				$userData = array(
					'ID' => $users[$i-1]->UserID,
					'Email' => $users[$i-1]->Email,
					'eventName' => $evs[$this->input->post("eventname")]->EventName,
					'inviteName' => $users[$i-1]->{'FirstName'}." ".$users[$i-1]->{'LastName'},
					'inviterName' => $this->session->userdata('FirstName')." ".$this->session->userdata('LastName'),
					'acceptLink' => "http://ievent.lemonhut.net/Invites/response/".$users[$i-1]->UserID."/".$eID."/4",
					'maybeLink' => "http://ievent.lemonhut.net/Invites/response/".$users[$i-1]->UserID."/".$eID."/2",
					'declineLink' => "http://ievent.lemonhut.net/Invites/response/".$users[$i-1]->UserID."/".$eID."/3"
					);
					$this->Events_Model->attachEvent($eID, $users[$i-1]->UserID);
					$this->Email_Model->htmlMailSend($userData);
			}
			
			#							URI-1    URI-2     URI-3        URI-4    URI-5
			#http://ievent.lemonhut.net/Invites/response/(INVITEEID)/(EVENTID)/(RSVP-ENUM)
			$this->data = array(
				'view' => "Tester"	,
				'push' => $userData
			);
			$this->load->view('template_supplement', $this->data);
		}
	}
}
?>