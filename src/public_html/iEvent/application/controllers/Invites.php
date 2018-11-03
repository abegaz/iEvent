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
		
		if ($RSVP == 4)
		{
			$this->Events_Model->incrementAttendee($eID);
			$this->Events_Model->setUserResponse($userID, $eID, $RSVP);
		}
		else
		{
			$this->Events_Model->setUserResponse($userID, $eID, $RSVP);
		}
		
		redirect('authentication/login');
	}
	
	public function send()
	{
		$this->load->model('Users_Model');
		$this->load->model('Events_Model');
		$users = $this->Users_Model->getAllUsersNames();
		$evs = $this->Events_Model->getAllUserEvents($this->session->userdata['userID']);
		
		$all = array();
		$events = array();
		
		foreach ($users as $val)
		{
			array_push($all, $val->{'FirstName'}." ".$val->{'LastName'});
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
	}
}
?>