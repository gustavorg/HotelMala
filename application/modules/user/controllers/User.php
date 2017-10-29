<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct(){
        parent::__construct();
 	session_start(); 
    }

    public function index(){
        $data['content_view'] = 'user/user';

        $this->template->sample_template($data);
    }

    public function users(){
        $data['content_view'] = 'user/users_view';

        $this->template->sample_template($data);
    }
}

?>