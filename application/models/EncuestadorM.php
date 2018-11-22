<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EncuestadorM extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function Mostrar_Est($idSesion){
        $result=$this->db->query('SELECT e.NombreEs FROM ESTUDIO e, ESTUDIOS_DE_ENCUESTADOR ed WHERE ed.idEstudio = e.idEstudio AND ed.idEncuestador ='.$idSesion)->result();
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
    $result=$this->db->query('SELECT idEstudio FROM ESTUDIOS_DE_ENCUESTADOR WHERE idEncuestador ='.$idSesion)->result();
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
function Mostrar_EAsignadas($idSesion,$idEst){
    $result=$this->db->query('SELECT EAsignadas 
    FROM ESTUDIOS_DE_ENCUESTADOR 
    WHERE idEncuestador ='.$idSesion.'
    AND idEstudio ='.$idEst)->result();
    $descrip = $result[0]->EAsignadas;
    return $descrip;
}

}


