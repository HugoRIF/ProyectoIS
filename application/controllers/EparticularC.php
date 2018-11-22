<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EparticularC extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('ParticularM');
		$this->load->library('session');
		
	}
	function Cuest(){
		$data = array(
			'idEst' => $this->input->post('idEst'),
			'Accion' => $this->input->post('Accion'),
			
        );
        $Hacer=$data['Accion'];
		switch ($data['Accion']) {
            #crear ecnuesta
            case 1:
            echo $data['idEst'];
            $this->load->view('Vistas/Encabezado');
            $this->load->view('Vistas/CuestionariosV',$data);
               
            break;
            case 2:
            echo $data['idEst'];
			$this->load->view('Vistas/Encabezado');
            $this->load->view('Vistas/EliminarCuestionariosV',$data);
            
			break;
            case 3:
			echo $data['idEst'];
			$this->load->view('Vistas/Encabezado');
            $this->load->view('Vistas/ModCuestionariosV',$data);
            
            break;
            case 4:
            $this->load->view('Vistas/Encabezado');
            $this->load->view('Vistas/SeleccionarP',$data);
               
            break;
            default:
                # code...
                break;
        }
	}
function SeleccionarU(){

		$total=$this->input->post('totalD');
		$idEst=$this->input->post('idEst');
		
		$Usuarios_Seleccionar=array();
		for ($i=1; $i <= $total ; $i++) { 
			$datos=$this->input->post('datosU'.$i);
			if($datos!=""){
				 array_push($Usuarios_Seleccionar,$datos);
			}
			
		}
		$data = array(
			'idEst' => $this->input->post('idEst'),
			'seleccionados' => $Usuarios_Seleccionar
        );
		$this->ParticularM->SelecionarU($Usuarios_Seleccionar,$idEst);
		echo '<script>alert("Los Usuarios han sido Selecionados");</script>';
		
		$this->load->view('Vistas/Encabezado');
			$this->load->view('Vistas/SeleccionarPA',$data);

}
function AsigEncuestas(){

	$total=$this->input->post('totalD');
	$idEst=$this->input->post('idEst');
	
	$Usuarios_Seleccionar=array();
	for ($i=0; $i <= $total ; $i++) { 
		$datos=$this->input->post('datosU'.$i);
		if($datos!=""){
			 array_push($Usuarios_Seleccionar,$datos);
		}
		
	}
	$Encuestas_asigadas=array();
	for ($i=0; $i <= $total ; $i++) { 
		$datos=$this->input->post('NumAsig'.$i);
		if($datos!=""){
			 array_push($Encuestas_asigadas,$datos);
		}
		
	}
	$data = array(
		'idEst' => $this->input->post('idEst'),
		'seleccionados' => $Usuarios_Seleccionar
	);
	$this->ParticularM->AsignarE($Usuarios_Seleccionar,$idEst,$Encuestas_asigadas);
	echo '<script>alert("Los Usuarios han sido Selecionados");</script>';
	
	$this->load->view('Vistas/Encabezado');
		$this->load->view('Vistas/SeleccionarPA',$data);

}

}