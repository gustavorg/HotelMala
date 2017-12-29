<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct(){
        parent::__construct(); 
        $this->load->model('Validate');    
        session_start(); 
    }

    public function index($error = ""){
        
        if(isset($_SESSION['ID_User'])){
           redirect('home');
        }else{
            $this->load->view('index',$error);
        }
        //
       // $this->template->sample_template($data);
    }

    public function validate(){
        $user = $this->input->post('username');
        $pwd = $this->input->post('password');
        $result1= $this->Validate->verificarUser($user);
        if($result1){
            $result2= $this->Validate->verificar($user,$pwd);
            if($result2){
                foreach($result2 as $row)
                {         
                    $_SESSION['ID_User'] = $row->ID_User;
                    $_SESSION['ID_UserType'] = $row->ID_UserType;
                    if($row->Image == ""){ $foto = "user.png"; }else{ $foto = $row->Image;}
                    $_SESSION['Image'] = $foto;
                    $_SESSION['FirstName'] = $row->FirstName;
                    $_SESSION['LastName'] = $row->LastName;
                    $_SESSION['ID_Hotel'] = $row->ID_Hotel;
                }
                $error = "";
            }else{
                $error = 'Error en la clave. Por favor, escriba correctamente';
            }
        }else{
            $error = 'Este usuario no existe. Por favor, escriba correctamente';
        }
        
        $this->index($error);
       
            //header('Content-Type: application/json');
           // echo json_encode($response);

    }

    public function logout(){
           session_unset();
           $response = array('ID_User' => false);
           //echo json_encode($response);
           redirect('login');
    }
}

?>  