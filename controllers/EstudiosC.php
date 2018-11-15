<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstudiosC extends CI_Controller {
	function _contruct(){
		parent::_contruct();
        $this->load->helper('form');
        $this->load->model('EstudiosM');
	}
	function index(){
		$this->load->view('vistas/Headers');
		$this->load->view('vistas/EstudiosV');
    }
    function recibirdatos(){
		$data = array(
            'idEst' => $this->input->post('idEst'),
			'nombrEst' => $this->input->post('nombreEst'),
			'DescEst' => $this->input->post('DescEst')			
		);
		$this->EstudiosM->crearEstudio($data);
		$this->load->view('vistas/Headers');
		$this->load->view('vistas/EstudiosV');
	}

}
?>
