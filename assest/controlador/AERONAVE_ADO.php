<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/AERONAVE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class AERONAVE_ADO {
    
    
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
    public function listarAeronave(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   transporte_aeronave   limit 8;	");
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
    public function listarAeronaveCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   transporte_aeronave   WHERE   ESTADO_REGISTRO   = 1;	");
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

    public function listarAeronave2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   transporte_aeronave   WHERE   ESTADO_REGISTRO   = 0;	");
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
    public function verAeronave($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   transporte_aeronave   WHERE   ID_AERONAVE  = '".$ID."';");
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
    public function agregarAeronave(AERONAVE $AERONAVE){
        try{

       
            
            $query=
            "INSERT INTO   transporte_aeronave   (
                                                      NUMERO_AERONAVE  ,  
                                                      NOMBRE_AERONAVE  ,  
                                                      ID_LAEREA  , 
                                                      ID_EMPRESA  , 
                                                      ID_USUARIOI  , 
                                                      ID_USUARIOM  , 
                                                      INGRESO ,
                                                      MODIFICACION , 
                                                      ESTADO_REGISTRO   
                                                ) VALUES
	       	(?, ?, ?, ?, ?, ?,   SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $AERONAVE->__GET('NUMERO_AERONAVE')   ,
                    $AERONAVE->__GET('NOMBRE_AERONAVE')   ,
                    $AERONAVE->__GET('ID_LAEREA')      ,   
                    $AERONAVE->__GET('ID_EMPRESA')      ,   
                    $AERONAVE->__GET('ID_USUARIOI')     ,   
                    $AERONAVE->__GET('ID_USUARIOM')             
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarAeronave($id){
        try{$sql="DELETE FROM   transporte_aeronave   WHERE   ID_AERONAVE  =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarAeronave(AERONAVE $AERONAVE){
        try{
            $query = "
                UPDATE   transporte_aeronave   SET
                      MODIFICACION = SYSDATE(),
                      NOMBRE_AERONAVE  = ?,    
                      ID_LAEREA  = ?      ,
                      ID_USUARIOM  = ?     
                WHERE   ID_AERONAVE  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(   
                    $AERONAVE->__GET('NOMBRE_AERONAVE'),    
                    $AERONAVE->__GET('ID_LAEREA')   ,        
                    $AERONAVE->__GET('ID_USUARIOM')    ,
                    $AERONAVE->__GET('ID_AERONAVE')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
   

   
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(AERONAVE $AERONAVE){

        try{
            $query = "
		UPDATE   transporte_aeronave   SET			
              ESTADO_REGISTRO   = 0
		WHERE   ID_AERONAVE  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $AERONAVE->__GET('ID_AERONAVE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(AERONAVE $AERONAVE){
        try{
            $query = "
		UPDATE   transporte_aeronave   SET			
              ESTADO_REGISTRO   = 1
		WHERE   ID_AERONAVE  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $AERONAVE->__GET('ID_AERONAVE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function buscarAeronavePorLarea($IDLAEREA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   transporte_aeronave   WHERE   ID_LAEREA  = '".$IDLAEREA."';");
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

    public function listarAeronavePorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   transporte_aeronave   
                                            WHERE   ESTADO_REGISTRO   = 1
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "' ;	");
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
                                                IFNULL(COUNT(NUMERO_AERONAVE),0) AS 'NUMERO'
                                            FROM   transporte_aeronave  
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