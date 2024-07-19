<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/MAPERTURA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class MAPERTURA_ADO {
    
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
    public function listarMapertura(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_mapertura  limit 8;	");
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
    public function listarMaperturaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_mapertura   WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarMaperturaCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_mapertura  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verMapertura($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_mapertura  WHERE  ID_MAPERTURA = '".$ID."';");
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
    public function agregarMapertura(MAPERTURA $MAPERTURA){
        try{
 
            
            
            $query=
            "INSERT INTO  usuario_mapertura  (
                                                MOTIVO_MAPERTURA , 
                                                TABLA , 
                                                ID_REGISTRO , 
                                                ID_USUARIO  
                                            ) VALUES
	       	( ?, ?, ?, ?);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $MAPERTURA->__GET('MOTIVO_MAPERTURA'),
                    $MAPERTURA->__GET('TABLA'),
                    $MAPERTURA->__GET('ID_REGISTRO'),
                    $MAPERTURA->__GET('ID_USUARIO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarMapertura($id){
        try{
            $sql="DELETE FROM  usuario_mapertura  WHERE  ID_MAPERTURA =".$id.";";
            $statement=$this->conexion->prepare($sql);
            $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }    
    

    //FUNCIONES ESPECIALIZADAS
    public function aperturaRegistro ($TABLA,$COLUMNA,$ID){
        try{ 

            $sql="  UPDATE ".$TABLA." SET	
                            MODIFICACION = SYSDATE(),		
                            ESTADO = 1
                    WHERE ".$COLUMNA."= ".$ID.";";
            $statement=$this->conexion->prepare($sql);
            $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
 
    

    
}
?>