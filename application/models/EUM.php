<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');

class EUM extends CI_Model{
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function MostrarU(){
		 $result=$this->db->query('SELECT `NombreU` FROM `USUARIO` ORDER BY `idUsuario` ')->result();
		#$tam=$result->count();
		$arrayNombreU = array('');
		$i=0;
		 foreach ($result as $res) { 
			array_push($arrayNombreU,$result[$i]->NombreU);
			$i++;
		}
		return $arrayNombreU ;
		
	}
	function MostrarTipo(){
		$result=$this->db->query('SELECT TipoU FROM USUARIO u,TIPO_USUARIO t WHERE u.Tipo =t.idTipoU ORDER BY u.idUsuario ')->result();
	   #$tam=$result->count();
	   $arrayNombreU = array('');
	   $i=0;
		foreach ($result as $res) { 
		   array_push($arrayNombreU,$result[$i]->TipoU);
		   $i++;
	   }
	   return $arrayNombreU ;
   }

   function EliminarU($arreglo){
	   foreach ($arreglo as $nombre) {
		$query=$this->db->query('DELETE FROM `USUARIO` WHERE `NombreU`="'.$nombre.' " ');

	   }
	   return 1;
   }
}