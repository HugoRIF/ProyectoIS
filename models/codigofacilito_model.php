<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigofacilito_model extends CI_Model{
    function _construct(){
        parent::_construct();
        $this->load->database();
    }

    function crearCurso($data){
        $this->db->insert('cursos',array('nombreCurso'=>$data['nombre'],'VideosCurso'=>$data['videos'],'idCurso'=>$data['idCurso']));
    }
}
?>