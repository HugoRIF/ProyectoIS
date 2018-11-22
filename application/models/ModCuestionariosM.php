<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ModCuestionariosM extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function modificarCuestionario($data){
        $this->db->UPDATE('CUESTIONARIO_CONTEST',array('idCuestionario'=>$data['idCuestionario'],'Cuestionario'=>$data['Cuestionario'],'idEstudio'=>$data['idEst']));
    }
    function eliminarCuestionario($data){
        $this->db->DELETE('CUESTIONARIO_CONTEST',array('idCuestionario'=>$data['idCuestionario'],'Cuestionario'=>$data['Cuestionario'],'idEstudio'=>$data['idEst']));
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