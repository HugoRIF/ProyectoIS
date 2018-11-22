<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EstudiosM extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function crearEstudio($data,$idSesion){
        $this->db->insert('ESTUDIO',array('NombreEs'=>$data['nombreEst'],'DescripcionEs'=>$data['DescEst'],'idAdminEstudio'=>$idSesion));
        
    } function Mostrar_Est($idSesion){
        $result=$this->db->query('SELECT NombreEs FROM `ESTUDIO`  WHERE idAdminEstudio = '.$idSesion)->result();
       #$tam=$result->count();
       $arrayNombreEst = array('');
       $i=0;
        foreach ($result as $res) { 
           array_push($arrayNombreEst,$result[$i]->NombreEs);
           $i++;
       }
       return $arrayNombreEst ;
       
   }
   function Mostrar_idEst($idSesion){
    $result=$this->db->query('SELECT idEstudio FROM ESTUDIO WHERE idAdminEstudio ='.$idSesion)->result();
   #$tam=$result->count();
   $arrayNombreEst = array('');
   $i=0;
    foreach ($result as $res) { 
       array_push($arrayNombreEst,$result[$i]->idEstudio);
       $i++;
   }
   return $arrayNombreEst ;
   
}
function Mostrar_DescEst($idestu){
    $result=$this->db->query('SELECT `DescripcionEs` 
                                FROM `ESTUDIO` 
                                WHERE `idEstudio`='.$idestu)->result();
   $descrip = $result[0]->DescripcionEs;
   return $descrip;
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