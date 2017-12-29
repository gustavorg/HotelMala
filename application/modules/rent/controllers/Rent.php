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
        $Price = $this->input->post('Price');

        $response = $this->Rent_model->saveRentDetail($ID_Rent,$Info,$Price); 

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
        $nHours = $this->input->post('nHours');
        $Phone = $this->input->post('Phone');
       
        if(!$this->Customer_model->existCustomer($DNI)){
           //Almacena a Cliente
            $this->Customer_model->saveCustomer($DNI,$lastname,$firstname,$Phone); 
        }


        /* Calcular el tiempo */
        $datetime1 = new DateTime($DateFrom);
        $datetime2 = new DateTime($DateTo);
        $interval = $datetime1->diff($datetime2);

        $days = $interval->format('%R%a días');


        /* Calcular Precio */
    
        $query = $this->Room_model->selectPrice($ID_Room);
        foreach($query->result() as $row){
            if (date("w") == 0 || date("w") == 6){
                $PriceReal =  $row->PriceDayWeekend;
            }else{
                $PriceReal =  $row->PriceDay;
            }
            
            if($nHours != "" && $nHours < 12){
                $Price =  $row->PriceHour;
                $DateToReal = date("Y-m-d H:i:s", strtotime('+'.$nHours.' hours'));   
            }else{
        
                /* Calculo de Tiempo Fin */
             
                if($days >= 0 && $days < 3){
                    if($days == 0){
                        $hours = 12;
                        $Price =  $PriceReal;
                    }else{
                        $hours = 12 * $days;
                        if($days == 1){
                            $Price =  $PriceReal * 2;
                        }else{
                            $Price =  $PriceReal * 4;
                        }
                    }
                
                    $DateToReal = date("Y-m-d H:i:s", strtotime('+'.$hours.' hours'));   

                }else if($days > 2){
                    $Price =  $PriceReal * $days;
                    $DateToReal = date('Y-m-d H:i:s', strtotime('+'.$days.' days'));
                }

            }


                $response = $this->Rent_model->saveRent($ID_Room,$DNI,$DateFrom,$DateTo,$DateToReal);
                $ID_Rent = $this->Rent_model->RentUltimate();
                $this->Rent_model->saveDetailRent($ID_Rent,"Alquiler",$Price);

                //Cambiar estado de cuarto
                $this->Room_model->changeState($ID_Room,2); 

        }

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
}

?>  