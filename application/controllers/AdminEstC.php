<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEstC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('AdminEstM');
		$this->load->library('session');
	}
	
	function index(){
		$idSesion= $this->session->userdata('id');
	
		$this->load->view('Vistas/Encabezado');
	$this->load->view('Vistas/ingresoAE');
        }
        



	function inicio(){
	
	$this->load->view('Vistas/Encabezado');
	$this->load->view('Vistas/ingresoAE');
	}
	function EstParticular(){
		#recupero datos del formulario
		
		
			$idEstudio = $this->input->post('radio');
		
		$descripcion=$this->AdminEstM->Mostrar_DescEst($idEstudio);
		$datos=array(
			'idEst'=> $idEstudio,
			'NombreEst' => $this->AdminEstM->Mostrar_NombreEst($idEstudio),
			'Descripcion' => $descripcion,
			'CCuestionarios' => $this->AdminEstM->Mostrar_CantCuestionarios($idEstudio),
			
		);
	$this->load->view('Vistas/Encabezado');
	$this->load->view('Vistas/EstudioParticular',$datos);
	}
	function Salir(){
		$this->session->sess_destroy();
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/LoginV');
        
	}
}

?>