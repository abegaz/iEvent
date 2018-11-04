<?
class Exercise_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function createExercise($exerciseName, $muscleGroup, $level)
	{
		$dataInsert = array(
		'exerciseName' => $exerciseName,
		'muscleGroup' => $muscleGroup,
		'level' => $level
		);
		$this->db->insert('Exercises', $dataInsert);
		
		return $this->db->insert_id();
	}

	public function getExerciseID($exerciseName)
	{
		$this->db->select("exerciseID");
		$this->db->where("exerciseName", $exerciseName);
		return $this->db->get("Exercises")->row()->exerciseID;
	}

	public function getExerciseName($exerciseID)
	{
		$this->db->select("exerciseName");
		$this->db->where("exerciseID", $exerciseID);
		return $this->db->get("Exercises")->row()->exerciseName;
	}
	
	public function associateExercise($ExerciseID, $UserID)
	{
		$this->db->set("UserID", $UserID);
		$this->db->set("ExerciseID", $ExerciseID);
		$this->db->insert("ExerciseAssociationTemp");
	}
	
	public function getAllAssociatedExercises($userID)
	{
		/*
		SELECT * FROM `ExerciseAssociationTemp`
		WHERE `UserID` = 102
		*/
		
		$this->db->select("ExerciseID");
		$this->db->from("ExerciseAssociationTemp");
		$this->db->where("UserID", $userID);
		return $this->db->get()->result();
	}
	public function isAssocitated($ExerciseID, $UserID)
	{
		$row = $this->getAllAssociatedExercises($UserID);
		foreach ($row as $val)
		{
			if($val->ExerciseID == $ExerciseID)
			{
				//True mean there is an association
				return TRUE;
			}
		}
		return FALSE;
	}
	public function getAllExercises()
	{
		$this->db->select("*");
		$this->db->from("Exercises");
		return $this->db->get()->result();
	}
}
?>