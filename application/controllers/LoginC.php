<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('LoginM');
		$this->load->library('session');
		$this->load->model('AdminEstM');
		$this->load->model('EncuestadorM');

	}
	function index(){
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/LoginV');
		
		
	}
	function RecibirDatos(){
		#recibo datos
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'contra' => $this->input->post('contra')
		);
		#verifico que no esten vacios los valores
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
		#Verifico que exitan los datos
	$ingresaA=$this->LoginM->checaU($data);
		#guardo datos de la sesion
	$idU=$this->LoginM->Regresaid($data);
	$usuario_data = array(
		'id' => $idU,
		);
	 $this->session->set_userdata($usuario_data);
	 $idSesion= $this->session->userdata('id');
	 #direcciono segun los usuarios
	 switch ($ingresaA) {
		case 0:
		echo '<script>alert("Usuario y/o Contraseña invalidos");</script>';
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/LoginV');
		break;
		case 1:
		
			echo $idSesion;
		$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/ingresoAS');
			break;
		case 2:
		echo $idSesion;
			$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/ingresoAE');
			break;
		case 4:
		echo $idSesion;
			$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/ingresoE');
			break;
	}
	}
}
		
}

?>