<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PLANTA
 */
include_once '../../assest/config/BDCONFIG.php';
 //ESTRUCTURA DE LA CLASE
class  TMONEDA {

    const TABLA = 'fruta_tmoneda';
    
    //ATRIBUTOS DE LA CLASE    
    private	  $ID_TMONEDA; 
    private	  $NUMERO_TMONEDA;
    private	  $NOMBRE_TMONEDA;
    private   $ESTADO_REGISTRO; 
    private   $ID_EMPRESA; 
    private   $ID_USUARIOI; 
    private   $ID_USUARIOM; 
    
    
    //FUNCIONES GET Y SET    
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }

    static public function mdlGetMonedas($tabla){
        $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM $tabla WHERE ESTADO_REGISTRO = 1 AND ID_EMPRESA = :empresa");
        $stmt->bindParam(":empresa",$_SESSION['ID_EMPRESA'], PDO::PARAM_STR);
        $stmt->execute();
        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $retorno;
    }

    static public function mdlGetMoneda($id): string
    {
        $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM ".self::TABLA." WHERE ESTADO_REGISTRO = 1 AND ID_EMPRESA = :empresa");
        $stmt->bindParam(":empresa",$_SESSION['ID_EMPRESA'], PDO::PARAM_STR);
        $stmt->execute();
        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $retorno[0]['NOMBRE_TMONEDA'];
    }
}
?>