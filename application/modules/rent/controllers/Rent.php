<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Rent extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Rent_model');
        $this->load->model('room/Room_model');
        $this->load->model('roomType/RoomType_model');
        $this->load->model('customer/Customer_model');
        session_start(); 
    }

    public function index(){
        $data['content_view'] = 'Rent/rent_view';
        $_SESSION['menu'] = 'Registro';
        $this->template->sample_template($data);
    }

    public function listRoomTypes()
	{
		$response = array();
		$response = $this->RoomType_model->selectAll();
		header('Content-Type: application/json');
		echo json_encode($response);
    }

    public function listRoomAvailables($ID_RoomType)
	{
		$response = array();
		$response = $this->Room_model->selectRoomTypesAvailables($ID_RoomType);
		header('Content-Type: application/json');
		echo json_encode($response);
    }
    
    public function listRoomBusy()
	{
		$response = array();
		$response = $this->Rent_model->selectRoomTypesBusy();
		header('Content-Type: application/json');
		echo json_encode($response);
    }

    public function saveRent()
	{
        $DNI = $this->input->post('DNI');
        $lastname = $this->input->post('lastname');
        $firstname = $this->input->post('firstname');
        $ID_Room = $this->input->post('ID_Room');
        $DateFrom = $this->input->post('DateFrom');
        $DateTo = $this->input->post('DateTo');
        // Existe en la tabla cliente ?
       
        if(!$this->Customer_model->existCustomer($DNI)){
           //Almacena a Cliente
            $this->Customer_model->saveCustomer($DNI,$lastname,$firstname); 
        }
        
		$response = array();
        $response = $this->Rent_model->saveRent($ID_Room,$DNI,$DateFrom,$DateTo);
        
        //Cambiar estado de cuarto
        $this->Room_model->changeState($ID_Room,2); 
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}

?>  