<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
 	session_start(); 
    }

    public function index(){
        $data['content_view'] = 'user/user';
        $_SESSION['menu'] = 'Perfil';
        $this->template->sample_template($data);
    }

    public function users(){
        
        $data['content_view'] = 'user/users_view';
        $_SESSION['menu'] = 'Usuario';    
        $this->template->sample_template($data);
    }

    public function selectAll(){

		$response = array();
		$response = $this->User_model->selectAll();
		header('Content-Type: application/json');
		echo json_encode($response);
    }

    public function select($ID_User){
        
                $response = array();
                $response = $this->User_model->select($ID_User);
                header('Content-Type: application/json');
                echo json_encode($response);
    } 
    

    public function delete($ID_User){
        
                $response = array();
                $response = $this->User_model->delete($ID_User);
                header('Content-Type: application/json');
                echo json_encode($response);
    }

    public function update()
	{
        $ID_User = $this->input->post('ID_User');
        $DNI = $this->input->post('DNI');
        $Username = $this->input->post('Username');
        $Password = $this->input->post('Password');
        $Phone = $this->input->post('Phone');
        $lastname = $this->input->post('Lastname');
        $firstname = $this->input->post('Firstname');
        $ID_UserType = $this->input->post('ID_UserType');
        $State = $this->input->post('State');
        if($State == "on") { $State = 1; }
        $response = array();

        if($ID_User == ""){
            if(!$this->User_model->exist($DNI)){
                $response = $this->User_model->insert($ID_UserType,$Username,$Password,$firstname,$lastname,$DNI,$Phone,$State); 
             }
        }else{
            $response = $this->User_model->update($ID_User,$ID_UserType,$Username,$Password,$firstname,$lastname,$DNI,$Phone,$State); 
        }
        if($ID_User == ""){ $ID_User = 0; }
		header('Content-Type: application/json');
		echo json_encode($ID_User);
	}

}

?>