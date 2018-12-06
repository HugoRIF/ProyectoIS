<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CuestionarioC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('CuestionariosM');
		$this->load->library('session');
	}
	
	function index(){
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/CuestionariosV');
    }
    function recibirdatos(){
		$data = array(
            'nomCuestionario' => $this->input->post('nomCuestionario'),
			'idEst' => $this->input->post('idEst')			
		);
		$idC=$this->CuestionariosM->crearCuestionario($data);
		$data['idCuestionario']=$idC;
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/ReactivosV',$data);
	}
	function CuestionariosDelEst(){
		$data = array(
		   'idEst' => $this->input->get('id'),
			//'nombreEst'=>$this->CuestionariosM->NombreEst($this->input->get('id'))
		);
	
		echo("alv");
		$this->load->view('Vistas/Encabezado');
		return $this->load->view('Vistas/CuestionarioEst',$data);
		
	}
	function AgregaReactivo(){
		$data = array(
            'nomCuestionario' => $this->input->post('nomCuestionario'),
			'idEst' => $this->input->post('idEst'),
			'idCuestionario' => $this->input->post('idCuestionario'),
			'Pregunta' => $this->input->post('Pregunta'),
			'TipoP' => $this->input->post('TipoP'),
						
		);
	
		if($data['TipoP']=="MULTIPLE"){
			$data['opcion1']=$this->input->post('opcion1');
			$data['opcion2']=$this->input->post('opcion2');
			$data['opcion3']=$this->input->post('opcion3');
		}
		$this->CuestionariosM->Agrega_reactivo($data);
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/ReactivosV',$data);
	}
	function EliminarC(){
		
		$total=$this->input->post('totalD');
		$Cuestionarios_eliminar=array();
		for ($i=1; $i <= $total ; $i++) { 
			$datos=$this->input->post('datosCuestionario'.$i);
			if($datos!=""){
				 array_push($Cuestionarios_eliminar,$datos);
			}
			
		}
		if($this->CuestionariosM->EliminarC($Cuestionarios_eliminar)==1){
		echo '<script>alert("El cuestionario ha sido Eliminados");</script>';
		}else{
			echo '<script>alert("El Cuestionario aun se tiene registrado. No se puede eliminar");</script>';
			
		}
		$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/CuestionarioV');

			
	}
}
?>