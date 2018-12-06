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
      
        $insertaP=$this->db->query('INSERT INTO PREGUNTA(Pregunta,idTipoP,idCuestionario)
                                    VALUES("'.$data['Pregunta'].'",
                                            (SELECT idTipoP FROM TIPO_PREGUNTA WHERE TipoP="'.$data['TipoP'].'"),
                                            '.$data['idCuestionario'].')');
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
       
    }

    function EliminarC($arreglo){
        $query='';
          foreach ($arreglo as $idCuestionario) {
          $query=$this->db->query('DELETE FROM `cuestionario_contest` WHERE `idCuestionarioC`='.$idCuestionario );
              echo $idCuestionario;
          }
          if($query){
          return 1;
          }else return 0;
     }
     function MostrarC(){
        $result=$this->db->query('SELECT `CuestionarioC` FROM `cuestionario_contest` ORDER BY `idCuestionarioC` ')->result();
       #$tam=$result->count();
       $arrayNombreU = array('');
       $i=0;
        foreach ($result as $res) { 
           array_push($arrayNombreU,$result[$i]->NombreCuestionario);
           $i++;
       }
       return $arrayNombreCuestionarios ;
       
   }
   function MostrarId(){
       $result=$this->db->query('SELECT `idCuestionarioC` FROM `cuestionario_contest` ORDER BY `idCuestionarioC` ')->result();
     #$tam=$result->count();
     $arrayidU = array('');
     $i=0;
       foreach ($result as $res) { 
         array_push($arrayidU,$result[$i]->idCuestionarioC);
         $i++;
     }
     return $arrayidCuestionarios ;
     
 }
}
?>