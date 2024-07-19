<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/PLANTA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class PLANTA_ADO {
    
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
    public function listarPlanta(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_planta   limit 6;	");
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
    public function listarPlantaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_planta   WHERE    ESTADO_REGISTRO   = 1;	");
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


    public function listarPlantaPropiaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM   principal_planta   
                                            WHERE    ESTADO_REGISTRO   = 1
                                            AND TPLANTA = 1	");
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
    public function listarPlantaPropiaDistintaActualCBX($PLANTA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM   principal_planta   
                                            WHERE    ESTADO_REGISTRO   = 1
                                            AND ID_PLANTA != '".$PLANTA."'
                                            AND TPLANTA = 1	");
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
    public function listarPlantaExternaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM   principal_planta   
                                            WHERE    ESTADO_REGISTRO   = 1
                                            AND TPLANTA = 2	");
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
    public function listarPlanta2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_planta   WHERE    ESTADO_REGISTRO  = 0;	");
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
    public function verPlanta($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_planta   WHERE   ID_PLANTA  = '".$ID."';");
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
    public function buscarNombrePlanta($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_planta   WHERE   NOMBRE_PLANTA   LIKE '%".$NOMBRE."%';");
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
    public function agregarPlanta(PLANTA $PLANTA){
        try{
            
            $query=
            "INSERT INTO   principal_planta   ( 
                                                  NOMBRE_PLANTA  , 
                                                  RAZON_SOCIAL_PLANTA  ,  
                                                  DIRECCION_PLANTA  ,  
                                                  CODIGO_SAG_PLANTA  ,  
                                                  FDA_PLANTA  , 
                                                  TPLANTA  ,
                                                  ID_COMUNA  ,
                                                  ID_PROVINCIA  ,
                                                  ID_REGION  ,
                                                  ID_USUARIOI  , 
                                                  ID_USUARIOM  , 
                                                  INGRESO  ,
                                                  MODIFICACION  ,
                                                  ESTADO_REGISTRO  
                                            ) 
             VALUES
	       	( ?, ?, ?, ?,  ?, ?, ?, ?, ?,  ?, ?,   SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $PLANTA->__GET('NOMBRE_PLANTA'),
                    $PLANTA->__GET('RAZON_SOCIAL_PLANTA'),
                    $PLANTA->__GET('DIRECCION_PLANTA'),
                    $PLANTA->__GET('CODIGO_SAG_PLANTA'),
                    $PLANTA->__GET('FDA_PLANTA'),
                    $PLANTA->__GET('TPLANTA'),
                    $PLANTA->__GET('ID_COMUNA'),
                    $PLANTA->__GET('ID_PROVINCIA'),
                    $PLANTA->__GET('ID_REGION'),
                    $PLANTA->__GET('ID_USUARIOI'),
                    $PLANTA->__GET('ID_USUARIOM')

                   
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarPlanta($id){
        try{$sql="DELETE FROM   principal_planta   WHERE   ID_PLANTA  =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarPlanta(PLANTA $PLANTA){
        try{
            $query = "
        UPDATE   principal_planta   SET
             MODIFICACION    = SYSDATE(), 
             NOMBRE_PLANTA    = ?, 
             RAZON_SOCIAL_PLANTA  = ?,  
             DIRECCION_PLANTA  = ?, 
             CODIGO_SAG_PLANTA  = ?, 
             FDA_PLANTA   = ?   ,
             TPLANTA   = ?   ,
             ID_COMUNA  = ?,
             ID_PROVINCIA  = ?,
             ID_REGION  = ?,
             ID_USUARIOM  = ? 
		WHERE   ID_PLANTA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $PLANTA->__GET('NOMBRE_PLANTA'),
                    $PLANTA->__GET('RAZON_SOCIAL_PLANTA'),
                    $PLANTA->__GET('DIRECCION_PLANTA'),
                    $PLANTA->__GET('CODIGO_SAG_PLANTA'),
                    $PLANTA->__GET('FDA_PLANTA'),
                    $PLANTA->__GET('TPLANTA'),
                    $PLANTA->__GET('ID_COMUNA'),
                    $PLANTA->__GET('ID_PROVINCIA'),
                    $PLANTA->__GET('ID_REGION'),
                    $PLANTA->__GET('ID_USUARIOM'),
                    $PLANTA->__GET('ID_PLANTA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(PLANTA $PLANTA){

        try{
            $query = "
		UPDATE   principal_planta   SET				
          MODIFICACION  = SYSDATE(),	
              ESTADO_REGISTRO   = 0
		WHERE   ID_PLANTA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PLANTA->__GET('ID_PLANTA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(PLANTA $PLANTA){

        try{
            $query = "
		UPDATE   principal_planta   SET				
          MODIFICACION  = SYSDATE(),	
              ESTADO_REGISTRO   = 1
		WHERE   ID_PLANTA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PLANTA->__GET('ID_PLANTA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    

    public function listarPlantaDistinto($IDPLANTA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_planta   
                                            WHERE 
                                                ID_PLANTA != '".$IDPLANTA."'
                                            AND   ESTADO_REGISTRO   = 1;	");
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

    
}
?>