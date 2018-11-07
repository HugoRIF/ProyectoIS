<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RUNC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('RUNM');
		$this->load->model("Menu_model");
        $this->load->library('multi_menu');

	}
	
	function index(){
		$config["nav_tag_open"]          = '<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">';     
    $config["parent_tag_open"]       = '<li class="dropdown-submenu">';
    $config["parent_anchor_tag"]     = '<a tabindex="-1" href="%s">%s</a>'; 
    $config["children_tag_open"]     = '<ul class="dropdown-menu">';
    $config["item_divider"]          = "<li class='divider'></li>";
        
		$this->load->view('Vistas/RUN');
		
		}
	function RegistrarU(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'contra' => $this->input->post('contra'),
			'correo' => $this->input->post('correo'),
			'Tipo' => $this->input->post('Tipo')
		);
		if($data['nombre']==""){
			echo '<script>alert("Ingresa un usuario");</script>';
			$this->load->view('Vistas/RUN');
		}
		
		elseif($data['contra']==""){
			echo '<script>alert("Ingresa una Contraseña");</script>';
			$this->load->view('Vistas/RUN');
		}
		elseif($data['correo']==""){
			echo '<script>alert("Ingresa un Correo valido");</script>';
			$this->load->view('Vistas/RUN');
		}
		else{
		$creaReg=$this->RUNM->registraU($data);
		
		if($creaReg==1){
			echo '<script>alert("Registro Exitoso :)");</script>';
			echo $creaReg;
			$this->load->view('Vistas/RUN');
		}else{
			echo '<script>alert("No se pudo realizar el registro, intenta: \n -Usar otro nombre de usuario\n -Intentar màs tarde");</script>';
			$this->load->view('Vistas/RUN');
		}
	}
	}
	function inicio(){
	
		$config["nav_tag_open"]          = '<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">';     
    $config["parent_tag_open"]       = '<li class="dropdown-submenu">';
    $config["parent_anchor_tag"]     = '<a tabindex="-1" href="%s">%s</a>'; 
    $config["children_tag_open"]     = '<ul class="dropdown-menu">';
    $config["item_divider"]          = "<li class='divider'></li>";
        
    $this->multi_menu->initialize($config);
		$items = $this->Menu_model->MenuAS();
        $this->multi_menu->set_items($items);

		$this->load->view('Vistas/ingresoAS');
	}
		
}

?>