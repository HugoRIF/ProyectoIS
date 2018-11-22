<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstudiosInC extends CI_Controller {
	function _contruct(){
		parent::_contruct();
	}
	function index(){
		$this->load->view('vistas/Headers');
		$this->load->view('vistas/EstudiosInV');
    }
  

}
?>