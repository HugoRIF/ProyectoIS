<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReactivosC extends CI_Controller {
	function __contruct(){
		parent::__contruct();
        $this->load->helper('form');
        $this->load->model('ReactivosM');
	}
	function index(){
		$this->load->view('vistas/ReactivosV');
    }
    function recibirdatos(){
		$data = array(
            'Pregunta' => $this->input->post('Pregunta'),
			'RespuestaPree' => $this->input->post('RespuestaPree'),
						
		);
		$this->ReactivosM->crearPregunta($data);
		$this->ReactivosM->crearRespuestaPree($data);
		$this->load->view('vistas/ReactivosV');
	}

}
?>