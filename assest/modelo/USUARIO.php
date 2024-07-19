<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  USUARIO
 */

 //ESTRUCTURA DE LA CLASE
class USUARIO {
    const TABLA = 'usuario_usuario';
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_USUARIO;
    private	  $NOMBRE_USUARIO;
    private	  $PNOMBRE_USUARIO;
    private	  $SNOMBRE_USUARIO;
    private	  $PAPELLIDO_USUARIO;
    private	  $SAPELLIDO_USUARIO;
    private	  $CONTRASENA_USUARIO; 
    private	  $EMAIL_USUARIO; 
    private	  $TELEFONO_USUARIO;   
    private	  $NINTENTO;     
    private   $ESTADO_REGISTRO;
    private   $INGRESO;
    private   $MODIFICACION;
    private   $ID_TUSUARIO;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }


    static public function mdlGetUsuarioName($id): string
    {
        $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM ".self::TABLA." WHERE ID_USUARIO = :id");
        $stmt->bindParam(":id",$id, PDO::PARAM_STR);
        $stmt->execute();
        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $retorno[0]['NOMBRE_USUARIO'];
    }
}
?>