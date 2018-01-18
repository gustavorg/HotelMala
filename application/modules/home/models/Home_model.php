<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function selectHoy($ID_Hotel)
	{

		$query =  $this->db->query("SELECT IFNULL(SUM(rentdetail.Price),0) as Hoy FROM rentdetail 
                                    INNER JOIN rent ON rent.ID_Rent = rentdetail.ID_Rent
                                    INNER JOIN room ON room.ID_Room = rent.ID_Room
                                    WHERE room.ID_Hotel = ".$ID_Hotel. " AND DATE(rentdetail.DateCreate) = DATE(NOW()) ");
		
        foreach($query->result() as $row){
            return $row->Hoy;
        }
    }
    
    public function selectSemanal($ID_Hotel)
	{

		$query =  $this->db->query("SELECT IFNULL(SUM(rentdetail.Price),0) as Semanal FROM rentdetail 
                                    INNER JOIN rent ON rent.ID_Rent = rentdetail.ID_Rent
                                    INNER JOIN room ON room.ID_Room = rent.ID_Room
                                    WHERE room.ID_Hotel = ".$ID_Hotel." AND YEARweek(CURRENT_DATE) ");
		
        foreach($query->result() as $row){
            return $row->Semanal;
        }
    }
    
    public function selectMensual($ID_Hotel)
	{

		$query =  $this->db->query("SELECT IFNULL(SUM(rentdetail.Price),0) as Mensual FROM rentdetail 
                                    INNER JOIN rent ON rent.ID_Rent = rentdetail.ID_Rent
                                    INNER JOIN room ON room.ID_Room = rent.ID_Room
                                    WHERE room.ID_Hotel = ".$ID_Hotel." AND MONTH(CURRENT_DATE) ");
		
        foreach($query->result() as $row){
            return $row->Mensual;
        }
    }
    
    public function selectAnual($ID_Hotel)
	{

		$query =  $this->db->query("SELECT IFNULL(SUM(rentdetail.Price),0) as Ano FROM rentdetail 
                                    INNER JOIN rent ON rent.ID_Rent = rentdetail.ID_Rent
                                    INNER JOIN room ON room.ID_Room = rent.ID_Room
                                    WHERE room.ID_Hotel = ".$ID_Hotel." AND YEAR(CURRENT_DATE) ");
		
        foreach($query->result() as $row){
            return $row->Ano;
        }
    }

    public function ingresosAnual($ID_Hotel,$month,$year)
	{

		$query =  $this->db->query("SELECT IFNULL(SUM(rentdetail.Price),0) as price FROM rentdetail 
                                    INNER JOIN rent ON rent.ID_Rent = rentdetail.ID_Rent
                                    INNER JOIN room ON room.ID_Room = rent.ID_Room
                                    WHERE room.ID_Hotel = ".$ID_Hotel." AND MONTH(rentdetail.DateTo) = ".$month."
                                     AND YEAR(rentdetail.DateTo) = ".$year);
		
        foreach($query->result() as $row){
            return $row->price;
        }
    }
    
        
    public function ingresosAnualActual($ID_Hotel,$month)
	{

		$query =  $this->db->query("SELECT IFNULL(SUM(rentdetail.Price),0) as price FROM rentdetail 
                                    INNER JOIN rent ON rent.ID_Rent = rentdetail.ID_Rent
                                    INNER JOIN room ON room.ID_Room = rent.ID_Room
                                    WHERE room.ID_Hotel = ".$ID_Hotel." AND MONTH(rentdetail.DateTo) = ".$month);
		
        foreach($query->result() as $row){
            return $row->price;
        }
	}

    public function top5customers()
	{
		$query =  $this->db->query("SELECT SUM(rentdetail.Price) as Gasto ,customer.Name, COUNT(rent.ID_Rent) as Visita  FROM rentdetail 
                                    INNER JOIN rent ON rent.ID_Rent = rentdetail.ID_Rent
                                    INNER JOIN room ON room.ID_Room = rent.ID_Room
                                    INNER JOIN customer ON customer.Document = rent.ID_Customer
									GROUP BY customer.Name ORDER BY Gasto DESC,Visita  LIMIT 5");

            return $query->result();
        
	}

}