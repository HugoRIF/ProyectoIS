<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstudiosC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('EstudiosM');
		$this->load->library('session');
	}
	function index(){
		
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/EstudiosV');
    }
    function recibirdatos(){
		$data = array(
            'nombreEst' => $this->input->post('nombreEst'),
			'DescEst' => $this->input->post('DescEst')			
		);
		if($data['nombreEst']=="" ){
			echo '<script>alert("Ingresa un Nombre al Estudio");</script>';
			$this->load->view('Vistas/Encabezado');
		    $this->load->view('Vistas/EstudiosV');
		}
		elseif($data['DescEst']==""){
			echo '<script>alert("Ingresa una Descripcion");</script>';
			$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/EstudiosV');
		}else{
		$this->EstudiosM->crearEstudio($data,$this->session->userdata('id'));
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/EstudiosV');
		}
	}
	function EstudiosIn(){
		
		$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/EstudiosInV');
	}
	function EstParticular(){
		#recupero datos del formulario
		
		
			$idEstudio = $this->input->post('radio');
		
		$descripcion=$this->EstudiosM->Mostrar_DescEst($idEstudio);
		$datos=array(
			'NombreEst' => $idEstudio,
			'Descripcion' => $descripcion
		);
		$this->load->view('Vistas/Encabezado');
	$this->load->view('Vistas/EstudioParticular',$datos);
	
	}
}
?>
