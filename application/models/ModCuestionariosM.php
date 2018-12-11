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
        $rC=$this->db->query('SELECT idPregunta
            FROM PREGUNTA 
            WHERE idCuestionario =(
                SELECT idCuestionario 
                FROM CUESTIONARIO
               WHERE Cuestionario = "'.$data['nomCuestionario'].'")')->result();
        $i=0;
        foreach ($rC as $key) {
           
        
        $checaRespuestacampo=$this->db->query('DELETE 
                                            FROM RESPUESTA_CAMPO
                                            WHERE idRespuestaPre=(
                                                SELECT idRespuestaPre 
                                                FROM RESPUESTA_PREE 
                                                WHERE idPregunta ="'.$rC[$i]->idPregunta.'")');
    
   
    $checaRespuestaPre=$this->db->query('DELETE 
                                        FROM RESPUESTA_PREE 
                                        WHERE idPregunta ='.$rC[$i]->idPregunta);
     


    $i++;
}     
$checaPregunta=$this->db->query('DELETE 
                                    FROM PREGUNTA 
                                    WHERE idCuestionario = (
                                        SELECT idCuestionario 
                                        FROM CUESTIONARIO
                                        WHERE Cuestionario = "'.$data['nomCuestionario'].'")');
    
    $checaPartici=$this->db->query('DELETE 
                                    FROM ESTUDIOS_DE_ENCUESTADOR 
                                    WHERE idCuestionario =(
                                        SELECT idCuestionario 
                                        FROM CUESTIONARIO
                                        WHERE Cuestionario = "'.$data['nomCuestionario'].'")');
    
    $checacx=$this->db->query('DELETE 
                                    FROM CUESTIONARIO
                                    WHERE Cuestionario = "'.$data['nomCuestionario'].'"');                      
    return 1;
    }
}
?>