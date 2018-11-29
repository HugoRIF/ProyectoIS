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
      $q=$this->db->query('DELETE FROM CUESTIONARIO
         WHERE Cuestionario = "'.$data['nomCuestionario'].'" AND
         idEstudio ='.$data['idEst']);
   if($q){
    return 1;
   }else{
       return 0;
   }
    }
}
?>