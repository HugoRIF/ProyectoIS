<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModCuestionariosC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('ModCuestionariosM');
		$this->load->library('session');
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
            'nomCuestionario' => $this->input->post('nomCuestionario'),
			'idEst' => $this->input->post('idEst')			
		);
		$consult=$this->ModCuestionariosM->eliminarCuestionario($data);
		if($consult){
		echo '<script>alert("Cuestionario Eliminado");</script>';
		
        $this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/EliminarCuestionariosV',$data);}else{
			
		}
	}
}
?>