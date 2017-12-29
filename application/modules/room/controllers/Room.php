<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Room extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Room_model');
        session_start(); 
    }

    public function index(){
        $data['content_view'] = 'room/room_view';
        $_SESSION['menu'] = 'Habitacion';
        $this->template->sample_template($data);
    }

    public function listRoom()
	{
		$response = array();
		$response = $this->Room_model->selectAll();
		header('Content-Type: application/json');
		echo json_encode($response);
    }

    public function listRoomTypes($rent = "")
	{
		$response = array();
		$response = $this->Room_model->selectAllRoomTypes($rent);
		header('Content-Type: application/json');
		echo json_encode($response);
    }

    public function updateRoom()
	{
        $ID_Room = $this->input->post('ID_Room');
        $N = $this->input->post('N');
        $ID_Hotel = $this->input->post('ID_Hotel');
        $ID_RoomType = $this->input->post('ID_RoomType');
        $PriceDay = $this->input->post('PriceDay');
        $PriceHour = $this->input->post('PriceHour');
        $PriceDayWeekend = $this->input->post('PriceDayWeekend');
        $Caracteristicas = $this->input->post('Caracteristicas');
        // Existe en la tabla cliente ?
        $response = array();
        if($ID_Room == ""){
            if(!$this->Room_model->existRoom($N,$ID_Hotel)){
                $response = $this->Room_model->insert($N,$ID_Hotel,$PriceDay,$PriceHour,$PriceDayWeekend,$Caracteristicas,$ID_RoomType);
            }
        }else{
            $response = $this->Room_model->update($ID_Room,$N,$ID_Hotel,$PriceDay,$PriceHour,$PriceDayWeekend,$Caracteristicas,$ID_RoomType);
        } 
		header('Content-Type: application/json');
		echo json_encode($response);
    }
    
    public function deleteRoom($ID_Room)
	{
		$response = array();
		$response = $this->Room_model->delete($ID_Room);
		header('Content-Type: application/json');
		echo json_encode($response);
    }

}

?>  