<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Room_model extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function selectRoomTypesAvailables($ID_RoomType)
	{
		$query =  $this->db->query("SELECT * FROM room WHERE ID_StateType = 1  AND room.ID_Hotel = ".$_SESSION['ID_Hotel']."  AND ID_RoomType = ".$ID_RoomType );
		
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

	public function selectAll()
	{

		if($_SESSION['ID_Hotel']){
			$filtro = "WHERE room.ID_Hotel = ".$_SESSION['ID_Hotel'];
		}else{ $filtro = "";}

		$query =  $this->db->query("SELECT room.* , hotel.Hotel , roomtype.RoomType
									 FROM room INNER JOIN hotel ON hotel.ID_Hotel = room.ID_Hotel 
									 INNER JOIN roomtype ON roomtype.ID_RoomType = room.ID_RoomType
									".$filtro." ORDER BY roomtype.RoomType");
		
		if($query->num_rows() >= 1){
			return $query->result();
		}else{
            return false;
        }
	}

	public function insert($N,$ID_Hotel,$PriceDay,$PriceHour,$PriceDayWeekend,$Caracteristicas,$ID_RoomType)
	{
		$data = array(
			"N" => $N,
			"ID_RoomType" => $ID_RoomType,
			"ID_Hotel" => $ID_Hotel,
			"PriceDay" => $PriceDay,
			"PriceHour" => $PriceHour,
			"PriceDayWeekend" => $PriceDayWeekend,
			"Caracteristicas" => $Caracteristicas
		  );
		return  $this->db->insert('room', $data);
	}

	public function update($ID_Room,$N,$ID_Hotel,$PriceDay,$PriceHour,$PriceDayWeekend,$Caracteristicas,$ID_RoomType)
	{
		$data = array(
			"N" => $N,
			"ID_RoomType" => $ID_RoomType,
			"ID_Hotel" => $ID_Hotel,
			"PriceDay" => $PriceDay,
			"PriceHour" => $PriceHour,
			"PriceDayWeekend" => $PriceDayWeekend,
			"Caracteristicas" => $Caracteristicas
		);
		$this->db->where('ID_Room', $ID_Room);
		return $this->db->update('room',$data);
	}

	public function existRoom($N,$ID_Hotel)
	{
		$query =  $this->db->query("SELECT * FROM room WHERE N = ".$N." AND ID_Hotel = ".$ID_Hotel );
		
		if($query->num_rows() >= 1)
		{
			return true;
		}else
        {
            return false;
        }
	}


	public function delete($ID_Room){
		$this->db->where('ID_Room', $ID_Room);
		return $this->db->delete('room');
	}


	public function selectPrice($ID_Room) {
		
		 $sql= "SELECT PriceDay , PriceHour , PriceDayWeekend FROM room WHERE ID_Room = ".$ID_Room;
	   
			 $result = $this->db->query($sql);
			   
		   if(!$result) {
			 return false;
			}
			else {
				return $result;
			}
				  
								   
	}

	public function selectAllRoomTypes($rent = "")
	{
		if($rent){ $filtro = " WHERE room.ID_Hotel = ".$_SESSION['ID_Hotel']; }else{ $filtro = "";}

		$query =  $this->db->query("SELECT DISTINCT roomtype.ID_RoomType , roomtype.RoomType FROM roomtype INNER JOIN room ON room.ID_RoomType = roomtype.ID_RoomType".$filtro);
		
		if($query->num_rows() >= 1)
		{
			return $query->result();
		}else
        {
            return array();
        }
	}


}