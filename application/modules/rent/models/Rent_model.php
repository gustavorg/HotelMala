<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Rent_model extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function selectAllRoomTyps()
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

	public function selectRoomTypesBusy()
	{
		$filtro = "";
		//if($_SESSION['ID_UserType'] == 1){ $filtro = "AND DateFrom = ". }

		$query =  $this->db->query("SELECT customer.Apellidos , customer.Nombre , customer.DNI,room.N, rent.ID_Rent ,  
										   rent.DateFrom , room.ID_Room , roomtype.RoomType, rent.ID_Rent  ,
										   room.PriceDay
									FROM rent 
									INNER JOIN customer ON customer.DNI = rent.ID_Customer
									INNER JOIN room ON room.ID_Room = rent.ID_Room
									INNER JOIN roomtype ON roomtype.ID_RoomType = room.ID_RoomType" );
		
		if($query->num_rows() >= 1)
		{
			return $query->result();
		}else
        {
            return array();
        }
	}

	public function saveRent($ID_Room,$ID_Customer,$DateFrom,$DateTo)
	{
		$now = date('Y-m-d H:i:s');
		$data = array(
			"ID_User" => $_SESSION["ID_User"],
			"ID_Room" => $ID_Room,
			"ID_Customer" => $ID_Customer,
			"DateFrom" => $DateFrom,
			"DateTo" => $DateTo,
			"DateCreate" => $now,
			"DateMod" => $now
		  );
		return  $this->db->insert('rent', $data);
	}

}