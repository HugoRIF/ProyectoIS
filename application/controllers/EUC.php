<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EUC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('EUM');
		$this->load->model("Menu_model");
        $this->load->library('multi_menu');
        $this->load->library('table');

	}
	
	function index(){
        #$Usuarios=$this->EUM->MostrarU();
        #$data=array('consulta'=>$Usuarios);
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
			
			$this->load->view('Vistas/EUV');

			
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