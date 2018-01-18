<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function existCustomer($Document)
	{
		$query =  $this->db->query("SELECT * FROM customer WHERE Document = ".$Document );
		
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
		$query =  $this->db->query("SELECT customer.Name FROM customer WHERE Document = ".$DNI );
		
		if($query->num_rows() >= 1)
		{
			return $query->result();

		}else
        {
            return false;
        }
	}

	public function selectAllRequest()
	{
		$query =  $this->db->query("SELECT * FROM requestcustomer ");
		
		if($query->num_rows() >= 1)
		{
			return $query->result();

		}else
        {
            return false;
        }
	}

	public function saveCustomer($Document,$DocumentType,$Name,$ID_Request)
	{
		$data = array(
		  "Document" => $Document,
		  "DocumentType" => $DocumentType,
		  "Name" => $Name,
		  "ID_Request" => $ID_Request
		);
		$this->db->insert('customer', $data);
	}


}