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

	public function saveCustomer($DNI,$Apellido,$Nombre)
	{
		$data = array(
		  "DNI" => $DNI,
		  "Apellidos" => $Apellido,
		  "Nombre" => $Nombre
		);
		$this->db->insert('customer', $data);
	}


}