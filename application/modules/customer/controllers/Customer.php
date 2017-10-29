<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Customer extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Customer_model');
        session_start(); 
    }


    public function getNom($DNI)
	{
        $response = array();
        if($this->Customer_model->existCustomer($DNI)){
            $response = $this->Customer_model->selectDNI($DNI);
        }
		header('Content-Type: application/json');
		echo json_encode($response);
    }
    
}

?>  