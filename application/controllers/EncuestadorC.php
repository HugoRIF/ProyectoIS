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
	function Salir(){
		$this->session->sess_destroy();
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/LoginV');
        
	}
}

?>