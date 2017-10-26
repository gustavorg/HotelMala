<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Validate extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("url");
	}
	
	public function verificarUser($user){
	    $this->db->where('Username',$user);
		//$this->db->where('Password',$pwd);
		$query = $this->db->get('user');	
		if($query->num_rows() > 0)
		{
			return $query->result();
		} 
		else{
			return false;
		}
	}

	public function verificar($user,$pwd){
	    $this->db->where('Username',$user);
		$this->db->where('Password',$pwd);
		$query = $this->db->get('user');	
		if($query->num_rows() > 0)
		{
			return $query->result();
		} 
		else{
			return false;
		}
	}
}

?>