<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Codigofacilito extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->helper('form');
	}
	function index(){
		$this ->load->library('Menu', array('Inicio', 'Contacto', 'Cursos'));
		$data['Menu'] = $this -> menu->construirMenu()
;		$this ->load->view('codigofacilito/bienvenido', $data);
	}

	function holaMundo(){
		$this ->load->view('codigofacilito/headers');
		$this ->load->view('codigofacilito/bienvenido');
	}
	function nuevo(){
		$this ->load->view('codigofacilito/headers');
		$this ->load->view('codigofacilito/formulario');
	}
}



?>