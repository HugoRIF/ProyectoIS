<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EparticularC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('ParticularM');
		$this->load->library('session');
		
	}
	function Cuest(){
		$data = array(
			'idEst' => $this->input->post('idEst'),
			'Accion' => $this->input->post('Accion'),
			
        );
        $Hacer=$data['Accion'];
		switch ($data['Accion']) {
            #crear ecnuesta
            case 1:
            echo $data['idEst'];
            $this->load->view('Vistas/Encabezado');
            $this->load->view('Vistas/CuestionariosV',$data);
               
            break;
            case 2:
            echo $data['idEst'];
            break;
            case 3:
            echo $data['idEst'];
            break;
            case 4:
            $this->load->view('Vistas/Encabezado');
            $this->load->view('Vistas/SeleccionarP',$data);
               
            break;
            default:
                # code...
                break;
        }
	}
function SeleccionarU(){

		$total=$this->input->post('totalD');
		$Usuarios_Seleccionar=array();
		for ($i=1; $i <= $total ; $i++) { 
			$datos=$this->input->post('datosU'.$i);
			if($datos!=""){
				 array_push($Usuarios_Seleccionar,$datos);
			}
			
		}
		$this->ParticularM->SelecionarU($Usuarios_Seleccionar);
		echo '<script>alert("Los Usuarios han sido Selecionados");</script>';
			
		$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/SeleccionarP');

}
}