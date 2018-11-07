<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');

class LoginM extends CI_Model{
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function checaU($data){
		
		$this->db->where('usuario',$data['nombre']);
		$this->db->where('password',$data['contra']);
		$query = $this->db->get('login');
		
		if($query->num_rows() > 0)
		{
			
			$query2 =  $this->db->query('SELECT Tipo 
										FROM `login`
			 							WHERE usuario ="'.$data['nombre'].'"
										AND password ="'.$data['contra'].'"')->result();
			$tipoU = $query2[0]->Tipo;
			switch ($tipoU) {
				case "AS":
					return 1;
					break;
				case "AE":
					return 2;
					break;
				case "E":
					return 3;
					break;
			}
		}
		else{ 


			return 0;
		}
	}
	

}
?>