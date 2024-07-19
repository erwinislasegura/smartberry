<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TMANEJO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TMANEJO_ADO {
   
    //ATRIBUTO
    private $conexion;
    
    //LLAMADO A LA BD Y CONFIGURAR PARAMETROS
    public function __CONSTRUCT()
    {
        try
        {
            $BDCONFIG = new BDCONFIG();
            $HOST = $BDCONFIG->__GET('HOST');
            $DBNAME = $BDCONFIG->__GET('DBNAME');
            $USER = $BDCONFIG->__GET('USER');
            $PASS = $BDCONFIG->__GET('PASS');

            
            $this->conexion = new PDO('mysql:host='.$HOST.';dbname='.$DBNAME, $USER ,$PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    
    
    
 //FUNCIONES BASICAS 
 //LISTAR TODO CON LIMITE DE 6 FILAS   
    public function listarTmanejo(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tmanejo  limit 8;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //LISTAR TODO
    public function listarTmanejoCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tmanejo  WHERE  ESTADO_REGISTRO  = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    public function listarTmanejo2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tmanejo  WHERE  ESTADO_REGISTRO  = 0;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verTmanejo($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tmanejo  WHERE  ID_TMANEJO = '".$ID."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

  
    
    //BUSCAR CONSIDENCIA DE ACUERDO AL CARACTER INGRESADO EN LA FUNCION
    public function buscarNombreTmanejo($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tmanejo  WHERE  NOMBRE_TMANEJO  LIKE '%".$NOMBRE."%';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //REGISTRO DE UNA NUEVA FILA    
    public function agregarTmanejo(TMANEJO $TMANEJO){
        try{
            
            
            $query=
            "INSERT INTO  fruta_tmanejo  (
                                             NOMBRE_TMANEJO , 
                                             ID_USUARIOI , 
                                             ID_USUARIOM ,
                                             INGRESO,
                                             MODIFICACION,
                                             ESTADO_REGISTRO 
                                        ) VALUES
	       	( ?, ?, ?,   SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $TMANEJO->__GET('NOMBRE_TMANEJO'),
                    $TMANEJO->__GET('ID_USUARIOI'),
                    $TMANEJO->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTmanejo($id){
        try{$sql="DELETE FROM  fruta_tmanejo  WHERE  ID_TMANEJO =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTmanejo(TMANEJO $TMANEJO){
        try{
            $query = "
		UPDATE  fruta_tmanejo  SET
             MODIFICACION= SYSDATE(),
             NOMBRE_TMANEJO = ?,
             ID_USUARIOM = ?            
		WHERE  ID_TMANEJO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $TMANEJO->__GET('NOMBRE_TMANEJO'),    
                    $TMANEJO->__GET('ID_USUARIOM'),     
                    $TMANEJO->__GET('ID_TMANEJO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
   
    //FUNCIONES ESPECIALIZADAS  
  

    
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TMANEJO $TMANEJO){

        try{
            $query = "
    UPDATE  fruta_tmanejo  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_TMANEJO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TMANEJO->__GET('ID_TMANEJO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TMANEJO $TMANEJO){
        try{
            $query = "
    UPDATE  fruta_tmanejo  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_TMANEJO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TMANEJO->__GET('ID_TMANEJO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
}
?>