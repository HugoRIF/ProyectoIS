<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEstM extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function Mostrar_Est($idSesion){
        $result=$this->db->query('SELECT NombreEs FROM `ESTUDIOS_DE USUARIO` eu , ESTUDIO e WHERE eu.idEstudio = e.idEstudio AND eu.idUsuario ='.$idSesion)->result();
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
    $result=$this->db->query('SELECT eu.idEstudio FROM `ESTUDIOS_DE USUARIO` eu , ESTUDIO e WHERE eu.idEstudio = e.idEstudio AND eu.idUsuario ='.$idSesion)->result();
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


}


