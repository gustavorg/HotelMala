<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct(){
        parent::__construct(); 
        $this->load->model('Validate');    
        session_start(); 
    }

    public function index(){
        
        if(isset($_SESSION['ID_User'])){
            $data['content_view'] = 'home/Home';
            $this->template->sample_template($data);
        }else{
            $this->load->view('index');
        }
        //$data['content_view'] = 'Login/index';
       // $this->template->sample_template($data);
    }

    public function validate(){
       
        $user = $this->input->post('user');
        $pwd = $this->input->post('password');
        $result1= $this->Validate->verificarUser($user);
        $response = array();
        if($result1){
            $result2= $this->Validate->verificar($user,$pwd);
            if($result2){
                foreach($result2 as $row)
                {         
                    $_SESSION['ID_User'] = $row->ID_User;
                    $_SESSION['FirstName'] = $row->FirstName;
                    $_SESSION['LastName'] = $row->LastName;
                }
                 $response = array('val' => 'true');
            }else{
                $response = array('val' => 'Error en el password. Por favor, escriba correctamente');
            }
        }else{
            $response = array('val' => 'Este usuario no existe. Por favor, escriba correctamente');
        }
       
            header('Content-Type: application/json');
            echo json_encode($response);

    }

    public function logout(){
           session_unset();
           $response = array('ID_User' => false);
           echo json_encode($response);
    }
}

?>  