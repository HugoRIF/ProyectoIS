<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');

class EUM extends CI_Model{
	function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
	function MostrarU(){
		 $query = $this->db->query('SELECT `usuario`,`Tipo` FROM `login`');
       return $query->row();
     }
}