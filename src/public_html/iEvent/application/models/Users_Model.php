<?
class Users_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function createUser($first, $last, $username, $email, $password)
	{
		$this->db->set("FirstName", $first);
		$this->db->set("LastName", $last);
		$this->db->set("Username", $username);
		$this->db->set("Email", $email);
		$this->db->set("Password", $password);
		//echo $this->db->get_compiled_insert("Users", FALSE)."<br>";
		$this->db->insert("Users");
		//echo $this->db->last_query()."<br>";
		
		return $this->db->insert_id();
	}
	public function assignRole($userID, $roleID)
	{
		$this->db->set("UserID", $userID);
		$this->db->set("RoleID", $roleID);
		$this->db->insert("AssignedRoles");
	}
	
	public function login($username, $password)
	{
		$this->db->select("UserID");
		$this->db->where("Username", $username);
		$this->db->where("Password", $password);
		$result = $this->db->get("Users")->result();
		if(count($result) > 0)
			return true;
		else
			return false;
	}
	
	public function getUserID($username)
	{
		$this->db->select("UserID");
		$this->db->where("Username", $username);
		return $this->db->get("Users")->row()->UserID;//returns first row, single column value
	}
	public function getUserInfo($userID)
	{
		$this->db->select("*");
		$this->db->where("UserID", $userID);
		return $this->db->get("Users")->row();//returns single row object
	}
	public function getUserRoles($userID)
	{
		/*
SELECT Users.Username, Users.UserID, Roles.RoleName, Roles.RoleID
FROM Users
JOIN AssignedRoles
	ON Users.UserID = AssignedRoles.UserID
JOIN Roles
	ON AssignedRoles.RoleID = Roles.RoleID
		*/
		$this->db->select("Roles.RoleName, Roles.RoleID");
		$this->db->from("Users");
		$this->db->join("AssignedRoles", "Users.UserID = AssignedRoles.UserID");
		$this->db->join("Roles", "AssignedRoles.RoleID = Roles.RoleID");
		$this->db->where("Users.UserID", $userID);
		return $this->db->get()->result();//returns array of row objects
		
	}
	
	public function getAllUsers()
	{
		$this->db->select("`FirstName`, `LastName`, `Email`, `Username`, `UserID`");
		$this->db->from("Users");
		$this->db->order_by("FirstName");
		$this->db->order_by("LastName");
		return $this->db->get()->result();
	}
	public function getAllUsersNames()
	{
		$this->db->select("FirstName");
		$this->db->select("LastName");
		$this->db->from("Users");
		$this->db->order_by("FirstName");
		$this->db->order_by("LastName");
		return $this->db->get()->result();
	}
	public function getUsers($first = FALSE)
	{
		$this->db->select("FirstName AS `First Name`, LastName AS `Last Name`, Username");
		$this->db->from("Users");
		
		if($first !== FALSE)
		{
			$this->db->like("FirstName", $first);
		}
		
		$this->db->order_by("LastName");
		$this->db->order_by("FirstName");
		return $this->db->get()->result();
	}

	public function groupWhere()
	{
		$this->db->from("Users");
		$this->db->group_start();
			$this->db->or_like("Username", 'a');
			$this->db->or_like("Username", 'b');
		$this->db->group_end();
		$this->db->like("Username", 'c');
		return $this->db->get()->result();
		/*
		SELECT *
		FROM Users
		WHERE
		(
			Username LIKE '%a%'
			OR
			Username LIKE '%b%'
		)
		AND
		Username LIKE '%c%'
		*/
	}
	public function getRoles()
	{
		return $this->db->get("Roles", 10);
		//SELECT * FROM Roles LIMIT 10
	}

}



?>