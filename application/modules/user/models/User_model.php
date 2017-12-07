<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function selectAll()
	{
		$query =  $this->db->query("SELECT user.* , usertype.UserType FROM user INNER JOIN usertype ON usertype.ID_UserType = user.ID_UserType " );
		
		if($query->num_rows() >= 1)
		{
			return $query->result();
		}else
        {
            return false;
        }
	}

	public function select($ID_User)
	{
		$query =  $this->db->query("SELECT user.* FROM user WHERE ID_User = ".$ID_User );
		
		if($query->num_rows() >= 1)
		{
			return $query->result();
		}else
        {
            return false;
        }
	}
	
	public function exist($DNI)
	{
		$query =  $this->db->query("SELECT * FROM user WHERE DNI = ".$DNI );
		
		if($query->num_rows() >= 1)
		{
			return true;
		}else
        {
            return false;
        }
	}

	public function insert($ID_UserType,$Username,$Password,$firstname,$lastname,$DNI,$Phone,$State)
	{

		$data = array(
			"ID_UserType" => $ID_UserType,
			"Username" => $Username,
			"Password" => $Password,
			"FirstName" => $firstname,
			"LastName" => $lastname,
			"DNI" => $DNI,
			"Phone" => $Phone,
			"Image" => '',
			"State" => $State
		  );
		return  $this->db->insert('user', $data);
	}

	public function update($ID_User,$ID_UserType,$Username,$Password,$firstname,$lastname,$DNI,$Phone,$State)
	{

		$data = array(
			"ID_UserType" => $ID_UserType,
			"Username" => $Username,
			"Password" => $Password,
			"FirstName" => $firstname,
			"LastName" => $lastname,
			"DNI" => $DNI,
			"Phone" => $Phone,
			"State" => $State
		  );
		  $this->db->where('ID_User',$ID_User);

		return  $this->db->update('user', $data);
	}

	public function delete($ID_User)
	{

		  $this->db->where('ID_User',$ID_User);

		return  $this->db->delete('user');
	}

}