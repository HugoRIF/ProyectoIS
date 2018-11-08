<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CuestionarioC extends CI_Controller {

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
        
		$this->load->view('Vistas/EncuestaAV');
		
		}
    }