<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstudiosC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('LoginM');
		$this->load->model("Menu_model");
        $this->load->library('multi_menu');

	}

	function index(){
		//$this->load->view('Vistas/Headers');
		$this->load->view('Vistas/EstudiosV');
    }
    function recibirdatos(){
		$data = array(
            'idEst' => $this->input->post('idEst'),
			'nombreEst' => $this->input->post('nombreEst'),
			'DescEst' => $this->input->post('DescEst')			
		);
		$this->EstudiosM->crearEstudio($data);
		$this->load->view('Vistas/Headers');
		$this->load->view('Vistas/EstudiosV');
	}

}
?>
