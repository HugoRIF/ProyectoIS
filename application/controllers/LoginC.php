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
		$config["nav_tag_open"]          = '<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">';     
    $config["parent_tag_open"]       = '<li class="dropdown-submenu">';
    $config["parent_anchor_tag"]     = '<a tabindex="-1" href="%s">%s</a>'; 
    $config["children_tag_open"]     = '<ul class="dropdown-menu">';
    $config["item_divider"]          = "<li class='divider'></li>";
        
		$this->load->view('Vistas/LoginV');
		
		
	}
	function RecibirDatos(){
		$config["nav_tag_open"]          = '<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">';     
    $config["parent_tag_open"]       = '<li class="dropdown-submenu">';
    $config["parent_anchor_tag"]     = '<a tabindex="-1" href="%s">%s</a>'; 
    $config["children_tag_open"]     = '<ul class="dropdown-menu">';
    $config["item_divider"]          = "<li class='divider'></li>";

    $this->multi_menu->initialize($config);
		
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'contra' => $this->input->post('contra')
		);
		//$items = $this->Menu_model->MenuAS();
       // $this->multi_menu->set_items($items);

	$ingresaA=$this->LoginM->checaU($data);
	switch ($ingresaA) {
		case 0:
			$this->load->view('Vistas/rechazo');
			break;
		case 1:
		$items = $this->Menu_model->MenuAS();
        $this->multi_menu->set_items($items);

			$this->load->view('Vistas/ingresoAS');
			break;
		case 2:
			$this->load->view('Vistas/ingresoAE');
			break;
		case 3:
			$this->load->view('Vistas/ingresoE');
			break;
	}
	}
		
}

?>