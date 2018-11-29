<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');

class ParticularM extends CI_Model{
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function MostrarU(){
		
		 $result=$this->db->query('SELECT `NombreU` FROM `USUARIO` WHERE Tipo = 3 ORDER BY `idUsuario` ')->result();
		#$tam=$result->count();
		$arrayNombreU = array('');
		$i=0;
		 foreach ($result as $res) { 
			array_push($arrayNombreU,$result[$i]->NombreU);
			$i++;
		}
		return $arrayNombreU ;
		
	}
	function MostraridU(){
		$result=$this->db->query('SELECT `idUsuario` FROM `USUARIO` WHERE Tipo = 3 ORDER BY `idUsuario` ')->result();
	  #$tam=$result->count();
	  $arrayNombreU = array('');
	  $i=0;
		foreach ($result as $res) { 
		  array_push($arrayNombreU,$result[$i]->idUsuario);
		  $i++;
	  }
	  return $arrayNombreU ;
	  
  }
	function MostrarTipo(){
		$result=$this->db->query('SELECT Tipo FROM USUARIO  WHERE Tipo = 3 ORDER BY idUsuario ')->result();
	   #$tam=$result->count();
	   $arrayNombreU = array('');
	   $i=0;
		foreach ($result as $res) { 
		   array_push($arrayNombreU,$result[$i]->Tipo);
		   $i++;
	   }
	   return $arrayNombreU ;
   }

   function SelecionarU($arreglo,$id){
		foreach ($arreglo as $nombre) {
		$query=$this->db->query('INSERT INTO `ESTUDIOS_DE_ENCUESTADOR` (idEncuestador,idEstudio) VALUES ('.$nombre.','.$id.') ');

	   }
	   return 1;
   }
   function AsignarE($Usuarios_Seleccionar,$idEst,$Encuestas_asigadas){
	$i=0;
	foreach ($Usuarios_Seleccionar as $idU) {
	$query=$this->db->query('UPDATE `ESTUDIOS_DE_ENCUESTADOR`
	 SET `EAsignadas`='.$Encuestas_asigadas[$i].'
	  WHERE `idEncuestador`='.$idU.' 
	  AND `idEstudio`='.$idEst);
		$i++;
   }
   return 1;
}
}