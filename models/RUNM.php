<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');

class RUNM extends CI_Model{
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function registraU($data){
		
        $query1 =  $this->db->
        query('INSERT INTO `login`(`usuario`, `password`, `E-mail`, `Tipo`) 
        VALUES ("'.$data['nombre'].'","'.$data['contra'].'","'.$data['correo'].'","'.$data['Tipo'].'")');
        
        if(!$query1){
            //$num = $this->db->_error_number();
            return 0;
        }else{ 
            return 1;
        }
     }
}