<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EncuestadorM extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function Mostrar_Est($idSesion){
        $result=$this->db->query('SELECT e.NombreEs FROM ESTUDIO e, ESTUDIOS_DE_ENCUESTADOR ed WHERE ed.idEstudio = e.idEstudio AND ed.idUsuario ='.$idSesion)->result();
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
    $result=$this->db->query('SELECT idEstudio FROM ESTUDIOS_DE_ENCUESTADOR WHERE idUsuario ='.$idSesion)->result();
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
    WHERE idUsuario ='.$idSesion.'
    AND idEstudio ='.$idEst)->result();
    $descrip = $result[0]->EAsignadas;
    return $descrip;
}
function Mostrar_Reactivo($idEst,$i){
    $result=$this->db->query('SELECT Pregunta 
                            FROM PREGUNTA 
                            WHERE idCuestionario =(SELECT idCuestionario FROM CUESTIONARIO WHERE idEstudio='.$idEst.')')->result();
   #$tam=$result->count();
   $pregunta=$result[$i]->Pregunta;
   return $pregunta ;
   
}
function Mostrar_idReactivo($idEst,$i){
    $result=$this->db->query('SELECT idPregunta 
                            FROM PREGUNTA 
                            WHERE idCuestionario =(SELECT idCuestionario FROM CUESTIONARIO WHERE idEstudio='.$idEst.')')->result();
   #$tam=$result->count();
   $pregunta=$result[$i]->idPregunta;
   return $pregunta ;
   
}
function Mostrar_Respuestas($idP){
    $result=$this->db->query('SELECT RespuestaPree
                            FROM RESPUESTA_PREE 
                            WHERE idPregunta ='.$idP)->result();
   #$tam=$result->count();
   $Respuesta=explode("#",$result[0]->RespuestaPree);
   return $Respuesta ;
   
}
function dame_idCuest($idU,$idE){
    $result=$this->db->query('SELECT idCuestionario
                            FROM ESTUDIOS_DE_ENCUESTADOR 
                            WHERE idEstudio ='.$idE.' AND idUsuario='.$idU)->result();
   #$tam=$result->count();
   $Respuesta=$result[0]->idCuestionario;
   return $Respuesta ;
   
}
function Mostrar_cantReactivo($idC){
    $result=$this->db->query('SELECT count(*) as cant
                            FROM PREGUNTA 
                            WHERE idCuestionario ='.$idC)->result();
   #$tam=$result->count();
   $pregunta=$result[0]->cant;
   return $pregunta ;
   
}
function GuardaR_Respuestas($R,$P){
    $result=$this->db->query('INSERT INTO RESPUESTA_CAMPO(RespuestaC, idRespuestaPre)
                              VALUES("'.$R.'",(SELECT idRespuestaPre FROM RESPUESTA_PREE WHERE idPregunta='.$P.'))');
   
}
}


