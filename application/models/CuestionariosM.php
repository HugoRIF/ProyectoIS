<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CuestionariosM extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function crearCuestionario($data){
        $this->db->insert('CUESTIONARIO',array('Cuestionario'=>$data['numCuestionario'],'idEstudio'=>$data['idEst']));
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