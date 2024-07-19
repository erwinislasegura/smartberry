<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/CUARTEL.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class CUARTEL_ADO {
    
    
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
 //LISTAR TODO CON LIMITE DE 8 FILAS    
    public function listarCuartel(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_cuartel  LIMIT 6;	");
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
    public function listarCuartelCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_cuartel  WHERE  ESTADO_REGISTRO  = 1;	");
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
    
    public function listarCuartel2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_cuartel  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verCuartel($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_cuartel  WHERE  ID_CUARTEL = '".$ID."';");
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
    public function buscarNombreCuartel($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_cuartel  WHERE  NOMBRE_CUARTEL  LIKE '%".$NOMBRE."%';");
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
    public function agregarCuartel(CUARTEL $CUARTEL){

      
        try{
  
            $query=
            "INSERT INTO  fruta_cuartel  ( 
                                             NUMERO_CUARTEL ,  
                                             NOMBRE_CUARTEL ,  
                                             TIEMPO_PRODUCCION_ANO_CUARTEL , 
                                             ANO_PLANTACION_CUARTEL , 
                                             HECTAREAS_CUARTEL , 
                                             PLANTAS_EN_HECTAREAS , 
                                             DISTANCIA_PLANTA_CUARTEL ,  
                                             ID_VESPECIES ,   
                                             ID_EMPRESA ,   
                                             ID_USUARIOI , 
                                             ID_USUARIOM , 
                                             INGRESO ,
                                             MODIFICACION , 
                                             ESTADO_REGISTRO 
                                        ) VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(),  1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $CUARTEL->__GET('NUMERO_CUARTEL'),
                    $CUARTEL->__GET('NOMBRE_CUARTEL'),
                    $CUARTEL->__GET('TIEMPO_PRODUCCION_ANO_CUARTEL'),
                    $CUARTEL->__GET('ANO_PLANTACION_CUARTEL'),
                    $CUARTEL->__GET('HECTAREAS_CUARTEL'),
                    $CUARTEL->__GET('PLANTAS_EN_HECTAREAS'),
                    $CUARTEL->__GET('DISTANCIA_PLANTA_CUARTEL'),
                    $CUARTEL->__GET('ID_VESPECIES'),
                    $CUARTEL->__GET('ID_EMPRESA'),
                    $CUARTEL->__GET('ID_USUARIOI'),
                    $CUARTEL->__GET('ID_USUARIOM')
                    
                )
                
                );
        
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarCuartel(CUARTEL $CUARTEL){
        try{
            $query = "
                    UPDATE  fruta_cuartel  SET
                        MODIFICACION = SYSDATE(),
                        NOMBRE_CUARTEL  = ?,
                        TIEMPO_PRODUCCION_ANO_CUARTEL  = ?,
                        ANO_PLANTACION_CUARTEL  = ?,
                        HECTAREAS_CUARTEL  = ?,
                        PLANTAS_EN_HECTAREAS  = ?,
                        DISTANCIA_PLANTA_CUARTEL  = ?,
                        ID_VESPECIES = ?,
                        ID_USUARIOM = ?
                    WHERE  ID_CUARTEL = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $CUARTEL->__GET('NOMBRE_CUARTEL'),
                    $CUARTEL->__GET('TIEMPO_PRODUCCION_ANO_CUARTEL'),
                    $CUARTEL->__GET('ANO_PLANTACION_CUARTEL'),
                    $CUARTEL->__GET('HECTAREAS_CUARTEL'),
                    $CUARTEL->__GET('PLANTAS_EN_HECTAREAS'),
                    $CUARTEL->__GET('DISTANCIA_PLANTA_CUARTEL'),
                    $CUARTEL->__GET('ID_VESPECIES'),
                    $CUARTEL->__GET('ID_USUARIOM'),
                    $CUARTEL->__GET('ID_CUARTEL')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarCuartel($id){
        try{$sql="DELETE FROM  fruta_cuartel  WHERE  ID_CUARTEL =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
 
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(CUARTEL $CUARTEL){

        try{
            $query = "
    UPDATE  fruta_cuartel  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_CUARTEL = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $CUARTEL->__GET('ID_CUARTEL')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(CUARTEL $CUARTEL){
        try{
            $query = "
    UPDATE  fruta_cuartel  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_CUARTEL = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $CUARTEL->__GET('ID_CUARTEL')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarCuartelPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_cuartel  
                                             WHERE  ESTADO_REGISTRO  = 1
                                             AND ID_EMPRESA = '".$IDEMPRESA."' ;	");
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
    
    
    public function obtenerNumero($IDEMPRESA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                IFNULL(COUNT(NUMERO_CUARTEL),0) AS 'NUMERO'
                                            FROM  fruta_cuartel 
                                            WHERE ID_EMPRESA = '" . $IDEMPRESA . "'     
                                                ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
}
?>