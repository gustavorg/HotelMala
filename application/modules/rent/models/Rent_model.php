<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Rent_model extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}



	public function selectRoomTypesBusy()
	{
		$filtro = "";
		if($_SESSION['ID_Hotel']){
			$filtro = " room.ID_Hotel = ".$_SESSION['ID_Hotel']." AND";
		}
		$filtro = " WHERE ".$filtro."  (rent.Busy = 1 OR DATE(rent.DateCreate) = DATE(NOW()) OR DATE(rent.DateEnd) = DATE(NOW()) OR DATE(rent.DateTo) = DATE(NOW()))  ";


		$query =  $this->db->query("SELECT customer.Name ,rent.CreateEmployee, customer.DocumentType , customer.Document ,room.N, rent.ID_Rent ,  
										    rent.DateTo,rent.Busy,rent.Phone , room.ID_Room , roomtype.RoomType, rent.ID_Rent  ,
										    SUM(rentdetail.Price) as Price ,rent.Food, hotel.Hotel
									FROM rent 
									INNER JOIN customer ON customer.Document = rent.ID_Customer
									INNER JOIN room ON room.ID_Room = rent.ID_Room
									INNER JOIN roomtype ON roomtype.ID_RoomType = room.ID_RoomType
									INNER JOIN rentdetail ON rentdetail.ID_Rent = rent.ID_Rent
									INNER JOIN hotel ON hotel.ID_Hotel = room.ID_Hotel
									".$filtro."
									GROUP BY customer.Name,rent.Phone , customer.Document , customer.DocumentType ,room.N, rent.ID_Rent ,  
									rent.DateTo,rent.Busy,  room.ID_Room , roomtype.RoomType, rent.ID_Rent  ,rent.Food
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

	public function saveRent($ID_Room,$ID_Customer,$DateTo,$Food,$Phone,$EmployeeCreate)
	{$now = new DateTime();
		$data = array(
			"ID_User" => $_SESSION["ID_User"],
			"ID_Room" => $ID_Room,
			"ID_Customer" => $ID_Customer,
			"DateTo" => $DateTo,
			"Food" => $Food,
			"Phone" => $Phone,
			"Busy" => 1,
			"DateCreate" => $now->format('Y-m-d H:i:s'),
			"CreateEmployee" => $EmployeeCreate
		  );
		return  $this->db->insert('rent', $data);
	}


	public function saveRentDetail($ID_Rent,$Info,$Price,$DateTo,$ID_PaymentType)
	{$now = new DateTime();
		$data = array(
			"ID_Rent" => $ID_Rent,
			"Info" => $Info,
			"Price" => $Price,
			"DateTo" => $DateTo,
			"ID_PaymentType" => $ID_PaymentType,
			"DateCreate" => $now->format('Y-m-d H:i:s')
		  );
		return  $this->db->insert('rentdetail', $data);
	}


	public function updateRent($ID_Rent)
	{$now = new DateTime();
		$data = array(
			"Busy" => 0,
			"DateEnd" => $now->format('Y-m-d H:i:s')
		  );
		  $this->db->where('ID_Rent', $ID_Rent);
		return  $this->db->update('rent', $data);
	}

	public function updateDateTo($DateTo,$ID_Rent)
	{
		$data = array(
			"DateTo" => $DateTo
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


	public function filter($ID_Hotel = "",$DocumentType="",$Document="",$DateFrom="",$DateTo="",$EmployeeCreate="")
	{
		$filtro = "";
		if($_SESSION['ID_Hotel']){ $ID_Hotel = $_SESSION['ID_Hotel'];  }
		if($ID_Hotel != ""){
			$filtro = $filtro." AND room.ID_Hotel = ".$ID_Hotel;
		}

		if($DocumentType != ""){
			$filtro = $filtro." AND customer.DocumentType = ".$DocumentType;
		}

		if($Document != ""){
			$filtro = $filtro." AND customer.Document = ".$Document;
		}

		if($DateFrom != "" && $DateTo == ""){
			$filtro = $filtro." AND (DATE(rent.DateCreate) >= '".$DateFrom."' AND  DATE(rent.DateCreate) <= DATE(NOW())) OR (DATE(rent.DateCreate) >= '".$DateFrom."' AND  DATE(rent.DateCreate) <= DATE(rent.DateEnd)) ";
		}else if($DateFrom == "" && $DateTo != ""){
			$filtro = $filtro." AND DATE(rent.DateCreate) >= DATE(NOW()) AND (DATE(rent.DateEnd) <= '".$DateTo."' OR DATE(rent.DateTo) <= '".$DateTo."' )";
		}else if($DateFrom != "" && $DateTo != ""){
			$filtro = $filtro." AND DATE(rent.DateCreate) >= '".$DateFrom."' AND (DATE(rent.DateEnd) <= '".$DateTo."' OR DATE(rent.DateCreate) <= '".$DateTo."' )";
		}

		if($EmployeeCreate != ""){
			$filtro = $filtro." AND rent.CreateEmployee LIKE '%".$EmployeeCreate."%'";
		}

		if($filtro != ""){
			$filtro = " WHERE ".substr($filtro,4);
		}

		$query =  $this->db->query("SELECT customer.Name ,rent.CreateEmployee, customer.DocumentType , customer.Document ,room.N, rent.ID_Rent ,  
										    rent.DateTo,rent.Busy,rent.Phone , room.ID_Room , roomtype.RoomType, rent.ID_Rent  ,
										    SUM(rentdetail.Price) as Price ,rent.Food, hotel.Hotel
									FROM rent 
									INNER JOIN customer ON customer.Document = rent.ID_Customer
									INNER JOIN room ON room.ID_Room = rent.ID_Room
									INNER JOIN roomtype ON roomtype.ID_RoomType = room.ID_RoomType
									INNER JOIN rentdetail ON rentdetail.ID_Rent = rent.ID_Rent
									INNER JOIN hotel ON hotel.ID_Hotel = room.ID_Hotel
									".$filtro."
									GROUP BY customer.Name,rent.Phone , customer.Document , customer.DocumentType ,room.N, rent.ID_Rent ,  
									rent.DateTo,rent.Busy,  room.ID_Room , roomtype.RoomType, rent.ID_Rent  ,rent.Food
									ORDER BY ID_Rent DESC");


		if($query->num_rows() >= 1)
		{
			return $query->result();
		}else
        {
            return array("");
        }
	}


}