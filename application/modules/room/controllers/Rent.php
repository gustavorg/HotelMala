<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Rent extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Rent_model');
        $this->load->model('Room/Room_model');
        $this->load->model('RoomType/RoomType_model');
        session_start(); 
    }

    public function index(){
        $data['content_view'] = 'Rent/rent_view';
        $this->template->sample_template($data);
    }

    public function listRoomTyps()
	{
		$response = array();
		$response = $this->RoomType_model->selectAllRoomTyps();
		header('Content-Type: application/json');
		echo json_encode($response);
    }

    public function listRoom($ID_RoomType)
	{
		$response = array();
		$response = $this->Room_model->selectAllRoom($ID_RoomType);
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}

?>  