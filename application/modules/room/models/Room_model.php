<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Room_model extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function selectRoomTypesAvailables()
	{
		$query =  $this->db->query("SELECT * FROM room WHERE ID_StateType = 1" );
		
		if($query->num_rows() >= 1)
		{
			return $query->result();
		}else
        {
            return false;
        }
	}
	public function changeState($ID_Room,$ID_StateType)
	{
		$this->db->where('ID_Room', $ID_Room);
		$data = array(
			'ID_StateType' => $ID_StateType
		);
		$this->db->update('room',$data);
	}
}