<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ModCuestionariosC extends CI_Controller {
	function __contruct(){
		parent::__contruct();
        $this->load->helper('form');
        $this->load->model('ModCuestionariosM');
	}
	function index(){
		$this->load->view('vistas/Headers');
		$this->load->view('vistas/ModCuestionariosV');
    }
    function recibirdatos(){
		$data = array(
            'idCuestionario' => $this->input->post('idCuestionario'),
			'numCuestionario' => $this->input->post('numCuestionario'),
			'idEst' => $this->input->post('idEst')			
		);
		$this->ModCuestionariosM->modificarCuestionario($data);
		$this->load->view('vistas/Headers');
		$this->load->view('vistas/ModCuestionariosV');
	}
	function recibirdatosEliminar(){
		$data = array(
            'idCuestionario' => $this->input->post('idCuestionario'),
			'numCuestionario' => $this->input->post('numCuestionario'),
			'idEst' => $this->input->post('idEst')			
		);
		$this->ModCuestionariosM->eliminarCuestionario($data);
		$this->load->view('vistas/Headers');
		$this->load->view('vistas/ModCuestionariosV');
	}
}
?>