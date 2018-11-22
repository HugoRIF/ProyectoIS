<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstudiosM extends CI_Model{
    function _construct(){
        parent::_construct();
        $this->load->database();
    }

    function crearEstudio($data){
        $this->db->insert('estudio',array('idEstudio'=>$data['idEstudio'],'NombreEs'=>$data['NombreEs'],'DescripcionEs'=>$data['DescripcionEs']));
        
    }

    /*function crearEstudio($data){
        $query1 = $this->db->
        query('INSERT INTO `estudios`(`idEst`,`nombreEst`,`DescEst`)
        VALUES ("'.$data['idEst'].'","'.$data['nombreEst'].'","'$data['DescEst'].'")');
        if(!$query1){
            return 0;
        }else{
            return 1;
        }
    }*/
}
?>