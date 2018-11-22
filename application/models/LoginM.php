<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');

class LoginM extends CI_Model{
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function checaU($data){
		
		$this->db->where('NombreU',$data['nombre']);
		$this->db->where('Contraseña',$data['contra']);
		$query = $this->db->get('USUARIO');
		$tipoU="";
		if($query->num_rows() > 0)
		{
			
			$query2 =  $this->db->query('SELECT Tipo 
										FROM `USUARIO`
			 							WHERE NombreU ="'.$data['nombre'].'"
										AND Contraseña ="'.$data['contra'].'"')->result();
			$tipoU = $query2[0]->Tipo;
			//return $tipoU;
		}
		return $tipoU;
	}

	function Regresaid($data){
		$query =  $this->db->query('SELECT idUsuario 
										FROM `USUARIO`
			 							WHERE NombreU ="'.$data['nombre'].'"
										AND Contraseña ="'.$data['contra'].'"')->result();
			$idU = $query[0]->idUsuario;
			return $idU;
	}
}
?>