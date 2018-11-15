<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MisCuestionariosC extends CI_Controller {
	function _contruct(){
		parent::_contruct();
	}
	function index(){
		$this->load->view('vistas/MisCuestionariosV');
    }
  

}
?>