<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Home_model');
 	session_start(); 
    }

    public function index(){
        $data = array();
        $_SESSION['menu'] = 'Inicio';
        if(isset($_SESSION['ID_UserType'])){
            if($_SESSION['ID_UserType'] == 2){
                $data['content_view'] = 'home/home';
            }else{
                $data['HoyAura'] = $this->Home_model->selectHoy(1); 
                $data['HoyCris'] = $this->Home_model->selectHoy(2);
                $data['HoyTotal'] = $data['HoyAura'] + $data['HoyCris'];
                $data['SemanalAura'] = $this->Home_model->selectSemanal(1); 
                $data['SemanalCris'] = $this->Home_model->selectSemanal(2);
                $data['SemanalTotal'] = $data['SemanalAura'] + $data['SemanalCris'];
                $data['MensualAura'] = $this->Home_model->selectMensual(1); 
                $data['MensualCris'] = $this->Home_model->selectMensual(2);
                $data['MensualTotal'] = $data['MensualAura'] + $data['MensualCris'];
                $data['AnualAura'] = $this->Home_model->selectAnual(1);
                $data['AnualCris'] = $this->Home_model->selectAnual(2);
                $data['AnualTotal'] = $data['AnualAura'] +  $data['AnualCris'];
                $data['list_customers'] = $this->Home_model->top5customers();

                $ganancia1 = 0;$ganancia2 = 0;
                $mes = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
                for($i = 1;$i <= 12 ; $i++){
                    $ganancia1 = $ganancia1.",{meta:'Aura ".$mes[$i]."' , value:".$this->Home_model->ingresosAnualActual(1,$i)."}";
                    $ganancia2 = $ganancia2.",{meta:'Cris ".$mes[$i]."' , value:".$this->Home_model->ingresosAnualActual(2,$i)."}";
                }
                $data['ingresosAura'] = "[".substr($ganancia1,2)."]";
                $data['ingresosCris'] = "[".substr($ganancia2,2)."]";


                // Comparacion año actual y anterior
                $ganancia1 = "";$ganancia2 = "";
                for($i = 1;$i <= 12 ; $i++){
                    $ganancia1 = $ganancia1.",".$this->Home_model->ingresosAnual(1,$i,date("Y")-1);
                    $ganancia2 = $ganancia2.",".$this->Home_model->ingresosAnual(1,$i,date("Y"));
                }
                $data['ingresosAuraComparacion'] = "[".substr($ganancia1,1)."],[".substr($ganancia2,1)."]";

                $ganancia1 = "";$ganancia2 = "";
                for($i = 1;$i <= 12 ; $i++){
                    $ganancia1 = $ganancia1.",".$this->Home_model->ingresosAnual(2,$i,date("Y")-1);
                    $ganancia2 = $ganancia2.",".$this->Home_model->ingresosAnual(2,$i,date("Y"));
                }
                $data['ingresosCrisComparacion'] = "[".substr($ganancia1,1)."],[".substr($ganancia2,1)."]";

                $data['content_view'] = 'home/home_admin';
            }
        }


     

        $this->template->sample_template($data);
    }
}

?>