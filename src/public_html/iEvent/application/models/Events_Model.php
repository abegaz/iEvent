<?
class Events_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function createEvent($eventName, $owner, $privacy, $StartTime, $EndTime, $Summary)
	{
		$dataInsert = array(
		'EventName' => $eventName,
		'Owner' => $owner,
		'Privacy' => $privacy,
		'StartTime' => $StartTime,
		'EndTime' => $EndTime,
		'Summary' => $Summary
		);
		$this->db->insert('Events', $dataInsert);
		
		return $this->db->insert_id();
	}

	public function getEventID($eventName)
	{
		$this->db->select("EventID");
		$this->db->where("EventName", $eventName);
		return $this->db->get("Events")->row()->EventID;
	}

	public function getEventName($eventID)
	{
		$this->db->select("EventName");
		$this->db->where("EventID", $eventID);
		return $this->db->get("Events")->row()->EventName;
	}
	
	public function attachEvent($EventID, $UserID)
	{
		$this->db->set("UserID", $UserID);
		$this->db->set("EventID", $EventID);
		$this->db->insert("AttachedEvents");
	}
	
	public function getAllAttachedEvents($userID)
	{		
		$this->db->select("EventID");
		$this->db->from("AttachedEvents");
		$this->db->where("UserID", $userID);
		return $this->db->get()->result();
	}
	
	public function isAttached($EventID, $UserID)
	{
		$row = $this->getAllAssociatedEvents($UserID);
		foreach ($row as $val)
		{
			if($val->EventID == $EventID)
			{
				//True mean there is an association
				return TRUE;
			}
		}
		return FALSE;
	}
	
	public function getEventsInfo($EventID)
	{
		$this->db->select("*");
		$this->db->where("EventID", $EventID);
		return $this->db->get("Events")->row();
	}
	
	public function getAllEvents()
	{
		$this->db->select("*");
		$this->db->from("Events");
		return $this->db->get()->result();
	}
	
	public function getAttendeeCount($eventID)
	{
		#SELECT AttendeeCount FROM `Events` WHERE `EventID` = $eventID
		
		$this->db->select("AttendeeCount");
		$this->db->from("Events");
		$this->db->where("EventID", $eventID);
		$array = $this->db->get()->result();
		return $array[0]->{'AttendeeCount'};
	}
	
	public function incrementAttendee($eventID)
	{
		$count = $this->getAttendeeCount($eventID) + 1;
		$this->db->set("AttendeeCount", $count);
		$this->db->where("EventID", $eventID);
		$this->db->update("Events");
	}
	
	public function setUserResponse($userID, $eventID, $rsvp)
	{
		#UPDATE `AttachedEvents` SET `RSVP` = $rsvp WHERE `EventID` = $eventID AND `UserID` = $userID
		$this->db->set("RSVP", $rsvp);
		$this->db->where("EventID", $eventID);
		$this->db->where("UserID", $userID);
		$this->db->update("AttachedEvents");
	}
	
	public function getAllUserEvents($UserID)
	{
		$this->db->select("EventName");
		$this->db->where("Owner", $UserID);
		return $this->db->get("Events")->result();
	}
}
?>
