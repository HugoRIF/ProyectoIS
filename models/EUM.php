<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');

class EUM extends CI_Model{
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function MostrarU(){
		 $result=$this->db->query('SELECT `usuario` FROM `login` ORDER BY `idUsuario` ')->result();
		#$tam=$result->count();
		$arrayNombreU = array('');
		$i=0;
		 foreach ($result as $res) { 
			array_push($arrayNombreU,$result[$i]->usuario);
			$i++;
		}
		return $arrayNombreU ;
		
	}
	function MostrarTipo(){
		$result=$this->db->query('SELECT `Tipo` FROM `login` ORDER BY `idUsuario` ')->result();
	   #$tam=$result->count();
	   $arrayNombreU = array('');
	   $i=0;
		foreach ($result as $res) { 
		   array_push($arrayNombreU,$result[$i]->Tipo);
		   $i++;
	   }
	   return $arrayNombreU ;
   }

   function EliminarU($arreglo){
	   foreach ($arreglo as $nombre) {
		$query=$this->db->query('DELETE FROM `login` WHERE `usuario`="'.$nombre.' " ');

	   }
	   return 1;
   }
}