<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RUNC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('RUNM');
	  $this->load->library('session');

	}
	
	function index(){
		echo $this->session->userdata('id');
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/RUN');
		
		}
	function RegistrarU(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'contra' => $this->input->post('contra'),
			'correo' => $this->input->post('correo'),
			'Tipo' => $this->input->post('Tipo')
		);
		$this->session->userdata('id');
			
		if($data['nombre']=="" ){
			echo '<script>alert("Ingresa un usuario");</script>';
			$this->load->view('Vistas/Encabezado');
		    $this->load->view('Vistas/RUN');
		}
		
		elseif($data['contra']==""){
			echo '<script>alert("Ingresa una Contraseña");</script>';
			$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/RUN');
		}
		
		elseif($data['correo']==""){
			echo '<script>alert("Ingresa un Correo valido");</script>';
			$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/RUN');
		}
		else{
		$creaReg=$this->RUNM->registraU($data);
		
		if($creaReg==1){
			echo '<script>alert("Registro Exitoso :)");</script>';
			$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/RUN');
		}else{
			echo '<script>alert("No se pudo realizar el registro, intenta: \n -Usar otro nombre de usuario\n -Intentar màs tarde");</script>';
			$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/RUN');
		}
	}
	}
	function inicio(){
	$this->load->view('Vistas/Encabezado');
	$this->load->view('Vistas/ingresoAS');
	}
	function Salir(){
		$this->session->sess_destroy();
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/LoginC');
        
	}
}

?>