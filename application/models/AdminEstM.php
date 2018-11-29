<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEstM extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function Mostrar_Est($idSesion){
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
function Mostrar_NombreEst($idestu){
    $result=$this->db->query('SELECT `NombreEs` 
                                FROM `ESTUDIO` 
                                WHERE `idEstudio`='.$idestu)->result();
   
   $descrip = $result[0]->NombreEs;
   return $descrip;
}

function Mostrar_CantCuestionarios($idestu){
    $result=$this->db->query('SELECT count(*) AS cantidad FROM CUESTIONARIO WHERE idEstudio='.$idestu)->result();
   
   $descrip = $result[0]->cantidad;
   return $descrip;
}
function Mostrar_NomCuestionarios($idestu){
    $result=$this->db->query('SELECT Cuestionario FROM CUESTIONARIO WHERE idEstudio='.$idestu)->result();
   $cuest=array('');
   $i=0;
   foreach ($result as $value) {
    array_push($cuest,$result[$i]->Cuestionario);
    $i++;
   }
   return $cuest;
}
function Mostrar_idCuestionarios($idestu){
    $result=$this->db->query('SELECT idCuestionario FROM CUESTIONARIO WHERE idEstudio='.$idestu)->result();
   $cuest=array('');
   $i=0;
   foreach ($result as $value) {
    array_push($cuest,$result[$i]->idCuestionario);
    $i++;
   }
   return $cuest;
}
}


