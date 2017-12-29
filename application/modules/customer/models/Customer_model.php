<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function existCustomer($DNI)
	{
		$query =  $this->db->query("SELECT * FROM customer WHERE DNI = ".$DNI );
		
		if($query->num_rows() >= 1)
		{
			return true;
		}else
        {
            return false;
        }
	}

	public function selectDNI($DNI)
	{
		$query =  $this->db->query("SELECT Apellidos,Nombre FROM customer WHERE DNI = ".$DNI );
		
		if($query->num_rows() >= 1)
		{
			return $query->result();

		}else
        {
            return false;
        }
	}

	public function saveCustomer($DNI,$Apellido,$Nombre,$Phone)
	{
		$data = array(
		  "DNI" => $DNI,
		  "Apellidos" => $Apellido,
		  "Nombre" => $Nombre,
		  "Phone" => $Phone
		);
		$this->db->insert('customer', $data);
	}


}