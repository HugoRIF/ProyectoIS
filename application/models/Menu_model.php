<?php
class Menu_model extends CI_Model {
    function __construct(){
		parent :: __construct();
		$this->load->database();
	}
	
    public function menuAS()
	{
		return $this->db->get("menus")
					->result_array();
	}
}