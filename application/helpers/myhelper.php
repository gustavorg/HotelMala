<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

    function codigoinicio(){
        
    $ci =& get_instance();
    $ci->db = $ci->load->database('default', TRUE);

                $sql= "SELECT  *  FROM  ";
    
                      $result =  $ci->DB2->query($sql);
                       if(! $result ||  $result->num_rows() < 1)
                       { $ID_Perfil = 0;}
                       else
                       { $ID_Perfil= $result->row()->ID_Perfil;  }

    }	






?>