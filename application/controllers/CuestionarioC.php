<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CuestionarioC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('CuestionariosM');
		$this->load->library('session');
	}
	
	function index(){
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/CuestionariosV');
    }
    function recibirdatos(){
		$data = array(
            'numCuestionario' => $this->input->post('numCuestionario'),
			'idEst' => $this->input->post('idEst')			
		);
		$this->CuestionariosM->crearCuestionario($data);
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/ReactivosV',$data);
	}
}
?>