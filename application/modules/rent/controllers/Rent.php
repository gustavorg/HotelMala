<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Rent extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Rent_model');
        $this->load->model('room/Room_model');
        $this->load->model('customer/Customer_model');
        session_start(); 
    }

    public function index(){
        $data['content_view'] = 'rent/rent_view';
        $_SESSION['menu'] = 'Registro';
        $this->template->sample_template($data);
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
    
    public function listRentDetails($ID_Rent)
	{
		$response = array();
		$response = $this->Rent_model->selectRentDetails($ID_Rent);
		header('Content-Type: application/json');
		echo json_encode($response);
    }

    public function saveRentDetail()
	{
        $ID_Rent = $this->input->post('ID_Rent');
        $Info = $this->input->post('Info');
        $Price = $this->input->post('PriceOtro');
        $DateTo = $this->input->post('DateTo');
        $ID_PaymentType = $this->input->post('ID_PaymentType2');
        
        if($DateTo != ""){
            $this->Rent_model->updateDateTo($DateTo,$ID_Rent);
            $Info = "Alquiler";
            $Price = $this->input->post('PriceRent');
        }

        $response = $this->Rent_model->saveRentDetail($ID_Rent,$Info,$Price,$DateTo,$ID_PaymentType); 

        header('Content-Type: application/json');
		echo json_encode($response);
    
    }

    public function saveRent()
	{
        $DocumentType = $this->input->post('DocumentType');
        if($DocumentType){ 
            $Name = $this->input->post('NameCompany');
            $Document = $this->input->post('RUC');
        }else{
            $Document = $this->input->post('DNI');
            $Name = $this->input->post('firstname')." ".$this->input->post('lastname');
        }
        $Phone = $this->input->post('Phone');
        $ID_Room = $this->input->post('ID_Room');
        $DateTo = $this->input->post('DateTo');
        $Food = $this->input->post('Food');
        $ID_PaymentType = $this->input->post('ID_PaymentType');
        $Price = $this->input->post('PriceRentReal');
        $EmployeeCreate = $this->input->post('EmployeeCreate');
       
        if(!$this->Customer_model->existCustomer($Document)){
           //Almacena a Cliente
            $this->Customer_model->saveCustomer($Document,$DocumentType,$Name,$this->input->post('ID_Request')); 
        }

                $response = $this->Rent_model->saveRent($ID_Room,$Document,$DateTo,$Food,$Phone,$EmployeeCreate);
                $ID_Rent = $this->Rent_model->RentUltimate();
                $this->Rent_model->saveRentDetail($ID_Rent,"Alquiler",$Price,$DateTo,$ID_PaymentType);

                //Cambiar estado de cuarto
                $this->Room_model->changeState($ID_Room,2); 

        

		header('Content-Type: application/json');
		echo json_encode($response);
    }
    
    public function updateRentRoom($ID_Rent,$ID_Room)
	{
		$response = array();
        $response = $this->Rent_model->updateRent($ID_Rent);
        $this->Room_model->changeState($ID_Room,1);
		header('Content-Type: application/json');
		echo json_encode($response);
    }


    
    public function filtro()
	{
        $ID_Hotel = $this->input->post('ID_Hotel');
        $DocumentType = $this->input->post('DocumentType');
        $Document = $this->input->post('Document');
        $DateFrom = $this->input->post('DateFrom');
        $DateTo = $this->input->post('DateTo');
        $EmployeeCreate = $this->input->post('EmployeeCreate');

        $response = $this->Rent_model->filter($ID_Hotel,$DocumentType,$Document,$DateFrom,$DateTo,$EmployeeCreate);

		header('Content-Type: application/json');
		echo json_encode($response);
    }
}

?>  