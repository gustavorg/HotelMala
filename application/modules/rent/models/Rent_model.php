<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Rent_model extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}



	public function selectRoomTypesBusy()
	{
		if($_SESSION['ID_Hotel']){
			$filtro = "WHERE room.ID_Hotel = ".$_SESSION['ID_Hotel'];
		}else{ $filtro = "";}


		$query =  $this->db->query("SELECT customer.Apellidos , customer.Nombre , customer.DNI,room.N, rent.ID_Rent ,  
										    rent.DateTo,rent.Busy, rent.DateToReal, rent.DateFrom , room.ID_Room , roomtype.RoomType, rent.ID_Rent  ,
										    SUM(rentdetail.Price) as Price
									FROM rent 
									INNER JOIN customer ON customer.DNI = rent.ID_Customer
									INNER JOIN room ON room.ID_Room = rent.ID_Room
									INNER JOIN roomtype ON roomtype.ID_RoomType = room.ID_RoomType
									INNER JOIN rentdetail ON rentdetail.ID_Rent = rent.ID_Rent
									".$filtro."
									GROUP BY customer.Apellidos , customer.Nombre , customer.DNI,room.N, rent.ID_Rent ,  
									rent.DateTo,rent.Busy, rent.DateToReal, rent.DateFrom , room.ID_Room , roomtype.RoomType, rent.ID_Rent 
									ORDER BY ID_Rent DESC");
		
		if($query->num_rows() >= 1)
		{
			return $query->result();
		}else
        {
            return array();
        }
	}


	public function selectRentDetails($ID_Rent)
	{

		$query =  $this->db->query("SELECT rentdetail.Price , rentdetail.Info
									FROM rentdetail 
									INNER JOIN rent ON rent.ID_Rent = rentdetail.ID_Rent
									WHERE rentdetail.ID_Rent = ".$ID_Rent);
		
		if($query->num_rows() >= 1)
		{
			return $query->result();
		}else
        {
            return array();
        }
	}

	public function saveRent($ID_Room,$ID_Customer,$DateFrom,$DateTo,$DateToReal)
	{
		$data = array(
			"ID_User" => $_SESSION["ID_User"],
			"ID_Room" => $ID_Room,
			"ID_Customer" => $ID_Customer,
			"DateFrom" => $DateFrom,
			"DateTo" => $DateTo,
			"DateToReal" => $DateToReal,
			"Busy" => 1
		  );
		return  $this->db->insert('rent', $data);
	}


	public function saveRentDetail($ID_Rent,$Info,$Price)
	{$now = new DateTime();
		$data = array(
			"ID_Rent" => $ID_Rent,
			"Info" => $Info,
			"Price" => $Price,
			"Date" => $now->format('Y-m-d H:i:s')
		  );
		return  $this->db->insert('rentdetail', $data);
	}


	public function saveDetailRent($ID_Rent,$Info,$Price)
	{ $now = new DateTime();
		$data = array(
			"ID_Rent" => $ID_Rent,
			"Date" => $now->format('Y-m-d H:i:s'),
			"Info" => $Info,
			"Price" => $Price
		  );
		return  $this->db->insert('rentdetail', $data);
	}

	public function updateRent($ID_Rent)
	{
		$data = array(
			"Busy" => 0
		  );
		  $this->db->where('ID_Rent', $ID_Rent);
		return  $this->db->update('rent', $data);
	}

	public function RentUltimate() {
		
		 $sql= "SELECT max(ID_Rent) as ultimo   from rent ";
	   
			 $result = $this->db->query($sql);
			   
		   if(!$result) {
			 return false;
			   }
				   else
				   {
							foreach ($result->result() as $row) {	return $row->ultimo;}
						   }
				  
								   
	}


}