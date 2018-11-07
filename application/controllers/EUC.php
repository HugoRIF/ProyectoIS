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
		$config["nav_tag_open"]          = '<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">';     
    $config["parent_tag_open"]       = '<li class="dropdown-submenu">';
    $config["parent_anchor_tag"]     = '<a tabindex="-1" href="%s">%s</a>'; 
    $config["children_tag_open"]     = '<ul class="dropdown-menu">';
    $config["item_divider"]          = "<li class='divider'></li>";
        
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
         echo $this->table->generate(MostarU());

    }
		
}

?>