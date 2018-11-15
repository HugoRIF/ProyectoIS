<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('LoginM');
		$this->load->model("Menu_model");
        $this->load->library('multi_menu');

	}
	function index(){
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/LoginV');
		
		
	}
	function RecibirDatos(){
		
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'contra' => $this->input->post('contra')
		);
	   if($data['nombre']==""){
		echo '<script>alert("Ingresa un usuario");</script>';
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/LoginV');
	}
	elseif($data['contra']==""){
		echo '<script>alert("Ingresa una Contraseña");</script>';
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/LoginV');
	}else{
	$ingresaA=$this->LoginM->checaU($data);
	switch ($ingresaA) {
		case 0:
		echo '<script>alert("Usuario y/o Contraseña invalidos");</script>';
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/LoginV');
		break;
		case 1:
			$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/ingresoAS');
			break;
		case 2:
			$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/ingresoAE');
			break;
		case 3:
			$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/ingresoE');
			break;
	}
	}
}
		
}

?>