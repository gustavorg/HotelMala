<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Template extends MY_Controller {

    public function __construct(){
        parent::__construct();  
        
    }

    public function sample_template($data = NULL){
        if(isset($_SESSION['ID_User'])){
            $this->load->view('Template/template',$data);
        }else{
            $this->load->view('Login/index');
        }
        
    }
}

?>