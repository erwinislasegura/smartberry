<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/RECEPCIONM.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class RECEPCIONM_ADO {
    
    
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
    public function listarRecepcion(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_recepcionm  limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarRecepcionCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_recepcionm  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarRecepcion2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_recepcionm  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verRecepcion($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_recepcionm  WHERE  ID_RECEPCION = '".$ID."';");
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

    public function verRecepcion2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                FECHA_RECEPCION AS 'FECHA' 
                                            FROM  material_recepcionm  
                                                WHERE  ID_RECEPCION = '".$ID."';");
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
  
    public function verRecepcion3($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y') AS 'FECHA' 
                                            FROM  material_recepcionm  
                                                WHERE  ID_RECEPCION = '".$ID."';");
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

    public function agregarRecepcion(RECEPCIONM $RECEPCIONM){
        try{
            
            if($RECEPCIONM->__GET('ID_PROVEEDOR')==NULL){
                $RECEPCIONM->__SET('ID_PROVEEDOR', NULL);
            }
            if($RECEPCIONM->__GET('ID_OCOMPRA')==NULL){
                $RECEPCIONM->__SET('ID_OCOMPRA', NULL);
            }
            if($RECEPCIONM->__GET('ID_PLANTA2')==NULL){
                $RECEPCIONM->__SET('ID_PLANTA2', NULL);
            }
            if($RECEPCIONM->__GET('ID_PRODUCTOR')==NULL){
                $RECEPCIONM->__SET('ID_PRODUCTOR', NULL);
            }
            $query=
            "INSERT INTO  material_recepcionm  ( NUMERO_RECEPCION ,
                                                 FECHA_RECEPCION ,
                                                 TRECEPCION ,
                                                 SNOCOMPRA ,
                                                 NUMERO_DOCUMENTO_RECEPCION ,
                                                 PATENTE_CAMION ,
                                                 PATENTE_CARRO ,
                                                 OBSERVACIONES_RECEPCION ,                                                
                                                 ID_EMPRESA ,
                                                 ID_PLANTA ,
                                                 ID_TEMPORADA ,
                                                 ID_BODEGA ,
                                                 ID_TDOCUMENTO ,
                                                 ID_TRANSPORTE ,
                                                 ID_CONDUCTOR ,
                                                 ID_PROVEEDOR ,
                                                 ID_OCOMPRA ,
                                                 ID_PLANTA2 ,
                                                 ID_PRODUCTOR ,
                                                 ID_USUARIOI ,
                                                 ID_USUARIOM ,
                                                 INGRESO ,
                                                 MODIFICACION ,
                                                 TOTAL_CANTIDAD_RECEPCION ,
                                                 ESTADO ,
                                                 ESTADO_REGISTRO ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(), 0,  1, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RECEPCIONM->__GET('NUMERO_RECEPCION')  ,   
                    $RECEPCIONM->__GET('FECHA_RECEPCION')  ,    
                    $RECEPCIONM->__GET('TRECEPCION')  ,    
                    $RECEPCIONM->__GET('SNOCOMPRA')  ,    
                    $RECEPCIONM->__GET('NUMERO_DOCUMENTO_RECEPCION')  ,         
                    $RECEPCIONM->__GET('PATENTE_CAMION')  ,  
                    $RECEPCIONM->__GET('PATENTE_CARRO')  ,        
                    $RECEPCIONM->__GET('OBSERVACIONES_RECEPCION')  ,     
                    $RECEPCIONM->__GET('ID_EMPRESA')  ,  
                    $RECEPCIONM->__GET('ID_PLANTA')  ,  
                    $RECEPCIONM->__GET('ID_TEMPORADA')  ,  
                    $RECEPCIONM->__GET('ID_BODEGA')  ,     
                    $RECEPCIONM->__GET('ID_TDOCUMENTO')  ,       
                    $RECEPCIONM->__GET('ID_TRANSPORTE')  ,       
                    $RECEPCIONM->__GET('ID_CONDUCTOR')  ,          
                    $RECEPCIONM->__GET('ID_PROVEEDOR')  ,                             
                    $RECEPCIONM->__GET('ID_OCOMPRA')  ,    
                    $RECEPCIONM->__GET('ID_PLANTA2')  ,       
                    $RECEPCIONM->__GET('ID_PRODUCTOR')   ,       
                    $RECEPCIONM->__GET('ID_USUARIOI') ,       
                    $RECEPCIONM->__GET('ID_USUARIOM')      
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }   
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarRecepcion($id){
        try{$sql="DELETE FROM  material_recepcionm  WHERE  ID_RECEPCION =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }      
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarRecepcion(RECEPCIONM $RECEPCIONM){
        try{
            if($RECEPCIONM->__GET('ID_PROVEEDOR')==NULL){
                $RECEPCIONM->__SET('ID_PROVEEDOR', NULL);
            }
            if($RECEPCIONM->__GET('ID_OCOMPRA')==NULL){
                $RECEPCIONM->__SET('ID_OCOMPRA', NULL);
            }
            if($RECEPCIONM->__GET('ID_PLANTA2')==NULL){
                $RECEPCIONM->__SET('ID_PLANTA2', NULL);
            }
            if($RECEPCIONM->__GET('ID_PRODUCTOR')==NULL){
                $RECEPCIONM->__SET('ID_PRODUCTOR', NULL);
            }
            $query = "
		UPDATE  material_recepcionm  SET
             MODIFICACION = SYSDATE(),
             FECHA_RECEPCION = ?,
             TRECEPCION = ?,
             SNOCOMPRA = ?,
             NUMERO_DOCUMENTO_RECEPCION = ?,
             PATENTE_CAMION = ?,
             PATENTE_CARRO = ?,
             OBSERVACIONES_RECEPCION = ?,
             TOTAL_CANTIDAD_RECEPCION = ?,
             ID_BODEGA = ?,
             ID_TDOCUMENTO = ?,
             ID_TRANSPORTE = ?,
             ID_CONDUCTOR = ?,
             ID_PROVEEDOR = ?,
             ID_OCOMPRA = ?,
             ID_PLANTA2 = ?,
             ID_PRODUCTOR = ?,
             ID_USUARIOM  = ?  
		WHERE  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(    
                    $RECEPCIONM->__GET('FECHA_RECEPCION')  ,    
                    $RECEPCIONM->__GET('TRECEPCION')  ,     
                    $RECEPCIONM->__GET('SNOCOMPRA')  ,     
                    $RECEPCIONM->__GET('NUMERO_DOCUMENTO_RECEPCION')  , 
                    $RECEPCIONM->__GET('PATENTE_CAMION')  ,  
                    $RECEPCIONM->__GET('PATENTE_CARRO')  ,         
                    $RECEPCIONM->__GET('OBSERVACIONES_RECEPCION')  , 
                    $RECEPCIONM->__GET('TOTAL_CANTIDAD_RECEPCION') , 
                    $RECEPCIONM->__GET('ID_BODEGA')  ,     
                    $RECEPCIONM->__GET('ID_TDOCUMENTO')  ,       
                    $RECEPCIONM->__GET('ID_TRANSPORTE')  ,       
                    $RECEPCIONM->__GET('ID_CONDUCTOR')  ,          
                    $RECEPCIONM->__GET('ID_PROVEEDOR')  ,                             
                    $RECEPCIONM->__GET('ID_OCOMPRA')  ,    
                    $RECEPCIONM->__GET('ID_PLANTA2')  ,       
                    $RECEPCIONM->__GET('ID_PRODUCTOR')   ,    
                    $RECEPCIONM->__GET('ID_USUARIOM')   ,
                    $RECEPCIONM->__GET('ID_RECEPCION')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 

    //CAMBIO DE ESTADO 
    //CAMBIO A CERRADO
    public function cerrado(RECEPCIONM $RECEPCIONM){

        try{
            $query = "
    UPDATE  material_recepcionm  SET			
     MODIFICACION = SYSDATE(),		
             ESTADO  = 0
    WHERE  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RECEPCIONM->__GET('ID_RECEPCION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ABIERTO
    public function abierto(RECEPCIONM $RECEPCIONM){
        try{
            $query = "
    UPDATE  material_recepcionm  SET				
     MODIFICACION = SYSDATE(),	
             ESTADO  = 1
    WHERE  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RECEPCIONM->__GET('ID_RECEPCION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(RECEPCIONM $RECEPCIONM){

        try{
            $query = "
    UPDATE  material_recepcionm  SET			
     MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 0
    WHERE  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RECEPCIONM->__GET('ID_RECEPCION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(RECEPCIONM $RECEPCIONM){
        try{
            $query = "
    UPDATE  material_recepcionm  SET				
     MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 1
    WHERE  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RECEPCIONM->__GET('ID_RECEPCION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }



    public function buscarID($FECHARECEPCION, $OBSERVACIONESRECEPCION,  $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {


            $datos = $this->conexion->prepare(" SELECT *
                                            FROM  material_recepcionm 
                                            WHERE 
                                                 FECHA_RECEPCION LIKE '" . $FECHARECEPCION . "'
                                                 AND OBSERVACIONES_RECEPCION LIKE '" . $OBSERVACIONESRECEPCION . "'  
                                                 AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                 AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')  
                                                 AND ID_EMPRESA = " . $EMPRESA . " 
                                                 AND ID_PLANTA = " . $PLANTA . " 
                                                 AND ID_TEMPORADA = " . $TEMPORADA . " 
                                            ORDER BY ID_RECEPCION DESC
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



    public function obtenerFecha()
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    CURDATE() AS 'FECHA' , 
                                                    DATE_FORMAT(NOW( ), '%H:%i') AS 'HORA' ;");
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

    public function obtenerNumero($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  IFNULL(COUNT(NUMERO_RECEPCION),0) AS 'NUMERO'
                                                FROM  material_recepcionm 
                                                WHERE  
                                                    ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "'     
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

    //LISTAS

    public function listarRecepcionCerradoPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *  ,
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',
                                                        FECHA_RECEPCION AS 'FECHA',
                                                        WEEK(FECHA_RECEPCION,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_RECEPCION) AS 'SEMANAISO',
                                                        IFNULL( TOTAL_CANTIDAD_RECEPCION ,0) AS 'CANTIDAD'
                                             FROM  material_recepcionm 
                                             WHERE ESTADO_REGISTRO = 1 
                                             AND ESTADO = 0
                                             AND ID_EMPRESA = '".$IDEMPRESA."' 
                                             AND ID_PLANTA = '".$IDPLANTA."'
                                             AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
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

    public function listarRecepcionPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *  ,
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',
                                                        FECHA_RECEPCION AS 'FECHA',
                                                        WEEK(FECHA_RECEPCION,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_RECEPCION) AS 'SEMANAISO',
                                                        IFNULL( TOTAL_CANTIDAD_RECEPCION ,0) AS 'CANTIDAD'
                                             FROM  material_recepcionm 
                                             WHERE ESTADO_REGISTRO = 1 
                                             AND ID_EMPRESA = '".$IDEMPRESA."' 
                                             AND ID_PLANTA = '".$IDPLANTA."'
                                             AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
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
    public function listarRecepcionPorEmpresaPlantaTemporada2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',
                                                DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y') AS 'FECHA',
                                                FORMAT(IFNULL( TOTAL_CANTIDAD_RECEPCION ,0),0,'de_DE') AS 'CANTIDAD'
                                             FROM  material_recepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
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
    public function listarRecepcionPorEmpresaTemporadaCBX($IDEMPRESA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',
                                                DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y') AS 'FECHA',
                                                IFNULL( TOTAL_CANTIDAD_RECEPCION ,0) AS 'CANTIDAD'
                                             FROM  material_recepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "'  ;	");
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
    public function listarRecepcionPorEmpresaTemporada2CBX($IDEMPRESA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',
                                                DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y') AS 'FECHA',
                                                FORMAT(IFNULL( TOTAL_CANTIDAD_RECEPCION ,0),0,'de_DE') AS 'CANTIDAD'
                                             FROM  material_recepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "'  ;	");
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
    //TOTALES

    public function obtenerTotalesRecepcionPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                                IFNULL(SUM( TOTAL_CANTIDAD_RECEPCION ),0) AS 'CANTIDAD'
                                            FROM  material_recepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
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
    public function obtenerTotalesRecepcionPorEmpresaPlantaTemporada2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM( TOTAL_CANTIDAD_RECEPCION ),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM  material_recepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
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
    public function obtenerTotalesRecepcionPorEmpresaTemporada2CBX($IDEMPRESA,  $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM( TOTAL_CANTIDAD_RECEPCION ),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM  material_recepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "'  ;	");
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