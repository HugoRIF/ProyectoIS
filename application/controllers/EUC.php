<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EUC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('EUM');
		
        $this->load->library('table');

	}
	
	function index(){
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/EUV');
		
		}
	function EliminarU(){
		
		$total=$this->input->post('totalD');
		$Usuarios_eliminar=array();
		for ($i=1; $i <= $total ; $i++) { 
			$datos=$this->input->post('datosU'.$i);
			if($datos!=""){
				 array_push($Usuarios_eliminar,$datos);
			}
			
		}
		$this->EUM->EliminarU($Usuarios_eliminar);
		echo '<script>alert("Los Usuarios han sido Eliminados");</script>';
			$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/EUV');

			
	}
	function inicio(){
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/ingresoAS');
        
    }
		
}

?>