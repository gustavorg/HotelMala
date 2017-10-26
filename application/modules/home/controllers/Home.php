<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct(){
        parent::__construct();
 	session_start(); 
    }

    public function index(){
        $data['content_view'] = 'home/Home';

        $this->template->sample_template($data);
    }
}

?>