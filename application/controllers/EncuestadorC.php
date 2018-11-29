<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EncuestadorC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('EncuestadorM');
		$this->load->library('session');
	}
	
	function index(){
		$idSesion= $this->session->userdata('id');
	
		$this->load->view('Vistas/Encabezado');
	$this->load->view('Vistas/ingresoE');
        }
        



	function inicio(){
	
	$this->load->view('Vistas/Encabezado');
	$this->load->view('Vistas/ingresoE');
	}
	function EParticular(){
		#recupero datos del formulario
		
		
			$idEstudio = $this->input->post('radio');
			$idSesion= $this->session->userdata('id');
	
		$descripcion=$this->EncuestadorM->Mostrar_DescEst($idEstudio);
		$datos=array(
			'idEst'=> $idEstudio,
			'NombreEst' => $this->EncuestadorM->Mostrar_NombreEst($idEstudio),
			'Descripcion' => $descripcion,
			'EAsignadas' =>$this->EncuestadorM->Mostrar_EAsignadas($idSesion,$idEstudio)
		);
	$this->load->view('Vistas/Encabezado');
	$this->load->view('Vistas/EstudioParticularE',$datos);
	}
	function Cuest(){
		
		$numerodeiter=$this->input->post('NPregunta') ;
		$cantidadPre=$this->EncuestadorM->Mostrar_cantReactivo($this->input->post('idEst'));
		if($numerodeiter >= $cantidadPre ){
			echo '<script>alert("Encuesta Terminada");</script>';
			
			$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/ingresoE');
		}else{
			if($numerodeiter>0){
				$respuesta=$this->input->post('respuestaCampo') ;
				
			}
			$datos=array(
				'idEst'=>  $this->input->post('idEst'),
				'NombreEst' => $this->EncuestadorM->Mostrar_NombreEst($this->input->post('idEst')),
				
				'NPregunta'=>  $this->input->post('NPregunta'),
				
				'idPregunta' => $this->EncuestadorM->Mostrar_idReactivo($this->input->post('idEst'),$this->input->post('NPregunta')),
				
				'NombrePregunta' => $this->EncuestadorM->Mostrar_Reactivo($this->input->post('idEst'),$this->input->post('NPregunta')),
				
			);
			$Respuestas=$this->EncuestadorM->Mostrar_Respuestas($datos['idPregunta']);
			$datos['Respuestas']=$Respuestas;
			$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/EncuestaE',$datos);
			}

	}
	function Salir(){
		$this->session->sess_destroy();
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/LoginV');
        
	}
}

?>