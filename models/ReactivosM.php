<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReactivosM extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function crearPregunta($data){
        $this->db->insert('pregunta',array('Pregunta'=>$data['Pregunta']));
    }
    function crearRespuestaPree($data){
        $this->db->insert('respuesta_pree',array('RespuestaPree'=>$data['RespuestaPree']));
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