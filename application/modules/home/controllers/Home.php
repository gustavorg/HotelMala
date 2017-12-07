<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct(){
        parent::__construct();
 	session_start(); 
    }

    public function index(){
        $data = array();
        $_SESSION['menu'] = 'Inicio';
        if(isset($_SESSION['ID_UserType'])){
            if($_SESSION['ID_UserType'] == 2){
            $data['content_view'] = 'home/home';
            }else{
            $data['content_view'] = 'home/home_admin';
            }
        }
     

        $this->template->sample_template($data);
    }
}

?>