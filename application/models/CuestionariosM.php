<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CuestionariosM extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function crearCuestionario($data){
        $this->db->query('INSERT INTO CUESTIONARIO(Cuestionario,idEstudio)
                            VALUES("'.$data['nomCuestionario'].'",'.$data['idEst'].')');
        $q=$this->db->query('SELECT idCuestionario 
                            FROM CUESTIONARIO 
                            WHERE Cuestionario="'.$data['nomCuestionario'].'"
                            AND idEstudio='.$data['idEst'])->result();
        $res=$q[0]->idCuestionario;
        return $res;
    }
    function NombreEst($id){
        $nombre=$this->db->query('SELECT NombreEs FROM ESTUDIO WHERE idEstudio='.$id)->result();
        return $nombre->NombreES;
    }
    function Agrega_reactivo($data){
      
        $insertaP=$this->db->query('INSERT INTO PREGUNTA (Pregunta,idTipoP,idCuestionario)
                                    VALUES("'.$data['Pregunta'].'",
                                            (SELECT idTipoP FROM TIPO_PREGUNTA WHERE TipoP="'.$data['TipoP'].'"),
                                            '.$data['idCuestionario'].')');
        if($insertaP){                                    
       switch ($data['TipoP']) {
           case "MULTIPLE":
           $insertaRpre=$this->db->query('INSERT INTO RESPUESTA_PREE(RespuestaPree,idPregunta)
           VALUES("'.$data['opcion1'].'#'.$data['opcion2'].'#'.$data['opcion3'].'",
                   (SELECT idPregunta 
                       FROM PREGUNTA 
                       WHERE Pregunta="'.$data['Pregunta'].'"
                         AND idCuestionario='.$data['idCuestionario'].'))');

               break;
               case "BINARIA":
               $insertaRpre=$this->db->query('INSERT INTO PREGUNTA_PREE(RespuestaPree,idPregunta)
               VALUES("SI/NO",
                       (SELECT idPregunta 
                           FROM PREGUNTA 
                           WHERE Pregunta="'.$data['Pregunta'].'"
                           AND idCuestionario='.$data['idCuestionario'].'))');
    
                   break;
                   case "ABIERTA":
                   $insertaRpre=$this->db->query('INSERT INTO PREGUNTA_PREE(RespuestaPree,idPregunta)
                   VALUES("ABIERTA",
                           (SELECT idPregunta 
                               FROM PREGUNTA 
                               WHERE Pregunta="'.$data['Pregunta'].'"
                                AND idCuestionario='.$data['idCuestionario'].'))');
        
                       break;
                       
           default:
               # code...
               break;
       }
       }else echo ("error kk");
       
    }
}
?>