<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigofacilito extends CI_Controller {

	function _contruct(){
		parent::_contruct();
		$this->load->helper('form');
		$this->load->model('codigofacilito_model');
	}

	function index(){
		$this->load->library('Menu',array('Inicio','Contacto','Cursos','Acerca de') );
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('codigofacilito/Headers');
		$this->load->view('codigofacilito/Bienvenido',$data);
	}
	
	function holaMundo(){
		$this->load->view('codigofacilito/Headers');
		$this->load->view('codigofacilito/Bienvenido');

	}

	function nuevo(){
		$this->load->view('codigofacilito/Headers');
		$this->load->view('codigofacilito/formularios');
	}

	function recibirDatos(){
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'videos' => $this->input->post('videos'),
			'idCurso' => $this->input->post('idCurso')
		);
		$this->codigofacilito_model->crearCurso($data);
		$this->load->view('codigofacilito/Headers');
		$this->load->view('codigofacilito/Bienvenido');
	}
}
?>