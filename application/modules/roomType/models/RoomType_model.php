<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class RoomType_model extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function selectAll()
	{
		$query =  $this->db->query("SELECT * FROM roomtype" );
		
		if($query->num_rows() >= 1)
		{
			return $query->result();
		}else
        {
            return array();
        }
	}

}