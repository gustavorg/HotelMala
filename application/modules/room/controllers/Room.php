<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Room extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Room_model');
        session_start(); 
    }

    public function index(){
        $data['content_view'] = 'room/room_view';
        $this->template->sample_template($data);
    }

}

?>  