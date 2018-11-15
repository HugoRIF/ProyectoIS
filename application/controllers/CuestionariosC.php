<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CuestionariosC extends CI_Controller {
	function __contruct(){
		parent::__contruct();
        $this->load->helper('form');
        $this->load->model('CuestionariosM');
	}
	function index(){
		$this->load->view('vistas/Headers');
		$this->load->view('vistas/CuestionariosV');
    }
    function recibirdatos(){
		$data = array(
            'idCuestionario' => $this->input->post('idCuestionario'),
			'numCuestionario' => $this->input->post('numCuestionario'),
			'idEst' => $this->input->post('idEst')			
		);
		$this->CuestionariosM->crearCuestionario($data);
		$this->load->view('vistas/Headers');
		$this->load->view('vistas/CuestionariosV');
	}

}
?>