<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/OCOMPRA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class OCOMPRA_ADO {
    
    
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
    public function listarOcompra(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_ocompra limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarOcompraCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_ocompra WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarOcompra2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_ocompra WHERE ESTADO_REGISTRO = 0;	");
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
    public function verOcompra($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_ocompra WHERE ID_OCOMPRA= '".$ID."';");
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

    public function verOcompra2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                DATE_FORMAT(FECHA_OCOMPRA, '%d-%m-%Y') AS 'FECHA' 
                                            FROM material_ocompra 
                                                WHERE ID_OCOMPRA= '".$ID."';");
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

    public function agregarOcompra(OCOMPRA $OCOMPRA){
        try{
            
         
            $query=
            "INSERT INTO material_ocompra (  
                                                NUMERO_OCOMPRA,
                                                NUMEROI_OCOMPRA,
                                                FECHA_OCOMPRA,
                                                TCAMBIO_OCOMPRA,
                                                OBSERVACIONES_OCOMPRA,                                                
                                                ID_EMPRESA,
                                                ID_PLANTA,
                                                ID_TEMPORADA,
                                                ID_RESPONSABLE,
                                                ID_PROVEEDOR,
                                                ID_FPAGO,
                                                ID_TMONEDA,
                                                ID_USUARIOI,
                                                ID_USUARIOM,
                                                INGRESO,
                                                MODIFICACION,
                                                TOTAL_CANTIDAD_OCOMPRA,
                                                TOTAL_VALOR_OCOMPRA,
                                                ESTADO,
                                                ESTADO_OCOMPRA,
                                                ESTADO_REGISTRO
                                            ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,   SYSDATE() , SYSDATE(), 0, 0, 1, 1, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $OCOMPRA->__GET('NUMERO_OCOMPRA')  ,   
                    $OCOMPRA->__GET('NUMEROI_OCOMPRA')  ,    
                    $OCOMPRA->__GET('FECHA_OCOMPRA')  ,    
                    $OCOMPRA->__GET('TCAMBIO_OCOMPRA')  ,         
                    $OCOMPRA->__GET('OBSERVACIONES_OCOMPRA')  ,   
                    $OCOMPRA->__GET('ID_EMPRESA')  ,  
                    $OCOMPRA->__GET('ID_PLANTA')  ,  
                    $OCOMPRA->__GET('ID_TEMPORADA')  ,  
                    $OCOMPRA->__GET('ID_RESPONSABLE')  ,     
                    $OCOMPRA->__GET('ID_PROVEEDOR')  ,       
                    $OCOMPRA->__GET('ID_FPAGO')  ,       
                    $OCOMPRA->__GET('ID_TMONEDA')  ,    
                    $OCOMPRA->__GET('ID_USUARIOI') ,       
                    $OCOMPRA->__GET('ID_USUARIOM')      
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }   
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarOcompra($id){
        try{$sql="DELETE FROM material_ocompra WHERE ID_OCOMPRA=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }      
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarOcompra(OCOMPRA $OCOMPRA){
        try{
      
            $query = "
		UPDATE material_ocompra SET
            MODIFICACION= SYSDATE(),
            NUMEROI_OCOMPRA= ?,
            FECHA_OCOMPRA= ?,
            TCAMBIO_OCOMPRA= ?,
            OBSERVACIONES_OCOMPRA= ?,
            TOTAL_CANTIDAD_OCOMPRA= ?,
            TOTAL_VALOR_OCOMPRA= ?,
            ID_RESPONSABLE= ?,
            ID_PROVEEDOR= ?,
            ID_FPAGO= ?,
            ID_TMONEDA= ?,
            ID_USUARIOM  = ?       
		WHERE ID_OCOMPRA= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(     
                    $OCOMPRA->__GET('NUMEROI_OCOMPRA')  ,    
                    $OCOMPRA->__GET('FECHA_OCOMPRA')  ,    
                    $OCOMPRA->__GET('TCAMBIO_OCOMPRA')  ,         
                    $OCOMPRA->__GET('OBSERVACIONES_OCOMPRA')  ,  
                    $OCOMPRA->__GET('TOTAL_CANTIDAD_OCOMPRA')  , 
                    $OCOMPRA->__GET('TOTAL_VALOR_OCOMPRA')  , 
                    $OCOMPRA->__GET('ID_RESPONSABLE')  ,     
                    $OCOMPRA->__GET('ID_PROVEEDOR')  ,       
                    $OCOMPRA->__GET('ID_FPAGO')  ,       
                    $OCOMPRA->__GET('ID_TMONEDA')  ,        
                    $OCOMPRA->__GET('ID_USUARIOM')  ,     
                    $OCOMPRA->__GET('ID_OCOMPRA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 

    //CAMBIO DE ESTADO 
    //CAMBIO A CERRADO
    public function cerrado(OCOMPRA $OCOMPRA){

        try{
            $query = "
    UPDATE material_ocompra SET			
            MODIFICACION= SYSDATE(),		
            ESTADO = 0
    WHERE ID_OCOMPRA= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $OCOMPRA->__GET('ID_OCOMPRA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ABIERTO
    public function abierto(OCOMPRA $OCOMPRA){
        try{
            $query = "
    UPDATE material_ocompra SET				
            MODIFICACION= SYSDATE(),	
            ESTADO = 1
    WHERE ID_OCOMPRA= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $OCOMPRA->__GET('ID_OCOMPRA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(OCOMPRA $OCOMPRA){

        try{
            $query = "
    UPDATE material_ocompra SET			
            MODIFICACION= SYSDATE(),		
            ESTADO_REGISTRO = 0
    WHERE ID_OCOMPRA= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $OCOMPRA->__GET('ID_OCOMPRA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(OCOMPRA $OCOMPRA){
        try{
            $query = "
    UPDATE material_ocompra SET				
            MODIFICACION= SYSDATE(),	
            ESTADO_REGISTRO = 1
    WHERE ID_OCOMPRA= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $OCOMPRA->__GET('ID_OCOMPRA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    public function creado(OCOMPRA $OCOMPRA){
        try{
            $query = "
                    UPDATE material_ocompra SET				
                            MODIFICACION= SYSDATE(),	
                            ID_USUARIOM  = ? ,
                            ESTADO_OCOMPRA = 1
                    WHERE ID_OCOMPRA= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(                    
                        $OCOMPRA->__GET('ID_USUARIOM')  ,   
                        $OCOMPRA->__GET('ID_OCOMPRA')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    public function confirmado(OCOMPRA $OCOMPRA){
        try{
            $query = "
                    UPDATE material_ocompra SET				
                            MODIFICACION= SYSDATE(),	
                            ID_USUARIOM  = ? ,
                            ESTADO_OCOMPRA = 2
                    WHERE ID_OCOMPRA= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(           
                        $OCOMPRA->__GET('ID_USUARIOM')  ,            
                        $OCOMPRA->__GET('ID_OCOMPRA')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }    

    public function rechazado(OCOMPRA $OCOMPRA){
        try{
            $query = "
                    UPDATE material_ocompra SET				
                            MODIFICACION= SYSDATE(),	
                            ID_USUARIOM  = ? ,
                            ESTADO_OCOMPRA = 3
                    WHERE ID_OCOMPRA= ?;";
                    //echo $query;
            $this->conexion->prepare($query)
            ->execute(
                    array(             
                        $OCOMPRA->__GET('ID_USUARIOM')  ,          
                        $OCOMPRA->__GET('ID_OCOMPRA')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }    
    public function aprobado(OCOMPRA $OCOMPRA){
        try{
            $query = "
                    UPDATE material_ocompra SET				
                            MODIFICACION= SYSDATE(),	
                            ID_USUARIOM  = ? ,
                            ESTADO_OCOMPRA = 4
                    WHERE ID_OCOMPRA= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(           
                        $OCOMPRA->__GET('ID_USUARIOM')  ,            
                        $OCOMPRA->__GET('ID_OCOMPRA')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function completatado(OCOMPRA $OCOMPRA){
        try{
            $query = "
                    UPDATE material_ocompra SET				
                            MODIFICACION= SYSDATE(),	
                            ID_USUARIOM  = ? ,
                            ESTADO_OCOMPRA = 5
                    WHERE ID_OCOMPRA= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(           
                        $OCOMPRA->__GET('ID_USUARIOM')  ,            
                        $OCOMPRA->__GET('ID_OCOMPRA')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function buscarID($FECHAOCOMPRA, $OBSERVACIONESOCOMPRA,  $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {


            $datos = $this->conexion->prepare(" SELECT *
                                            FROM material_ocompra
                                            WHERE 
                                                 FECHA_OCOMPRA LIKE '" . $FECHAOCOMPRA . "'
                                                 AND OBSERVACIONES_OCOMPRA LIKE '" . $OBSERVACIONESOCOMPRA . "'  
                                                 AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                 AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')  
                                                 AND ID_EMPRESA = " . $EMPRESA . " 
                                                 AND ID_PLANTA = " . $PLANTA . " 
                                                 AND ID_TEMPORADA = " . $TEMPORADA . " 
                                                 ORDER BY ID_OCOMPRA DESC
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

    public function obtenerNumero($EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  IFNULL(COUNT(NUMERO_OCOMPRA),0) AS 'NUMERO'
                                                FROM material_ocompra
                                                WHERE  
                                                    ID_EMPRESA = '" . $EMPRESA . "' 
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
    public function listarOcompraPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_ocompra
                                             WHERE ESTADO_REGISTRO = 1 
                                             AND ID_EMPRESA = '".$IDEMPRESA."' 
                                             AND ID_PLANTA = '".$IDPLANTA."'
                                             AND ID_TEMPORADA = '".$IDTEMPORADA."' ;	");
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
    public function listarOcompraPorAprobadoEmpresaTemporadaCBX($IDEMPRESA, $IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_ocompra
                                             WHERE ESTADO_REGISTRO = 1 
                                             AND ID_EMPRESA = '".$IDEMPRESA."' 
                                             AND ID_TEMPORADA = '".$IDTEMPORADA."' 
                                             AND ESTADO_OCOMPRA = '4'  ;	");
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

    public function listarOcompraCerradoPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',
                                                        FECHA_OCOMPRA AS 'FECHA',
                                                        WEEK(FECHA_OCOMPRA,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_OCOMPRA) AS 'SEMANAISO',
                                                        IFNULL(TOTAL_CANTIDAD_OCOMPRA,0) AS 'CANTIDAD',
                                                        IFNULL(TOTAL_VALOR_OCOMPRA,0) AS 'TOTAL_VALOR'
                                             FROM material_ocompra
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 0
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
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

    public function listarOcompraPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',
                                                        FECHA_OCOMPRA AS 'FECHA',
                                                        WEEK(FECHA_OCOMPRA,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_OCOMPRA) AS 'SEMANAISO',
                                                        IFNULL(TOTAL_CANTIDAD_OCOMPRA,0) AS 'CANTIDAD',
                                                        IFNULL(TOTAL_VALOR_OCOMPRA,0) AS 'TOTAL_VALOR'
                                             FROM material_ocompra
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
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
    public function listarOcompraPorEmpresaTemporada2CBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',
                                                DATE_FORMAT(FECHA_OCOMPRA, '%d-%m-%Y') AS 'FECHA',
                                                FORMAT(IFNULL(TOTAL_CANTIDAD_OCOMPRA,0),0,'de_DE') AS 'CANTIDAD',
                                                FORMAT(IFNULL(TOTAL_VALOR_OCOMPRA,0),2,'de_DE') AS 'TOTAL_VALOR'
                                             FROM material_ocompra
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
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

    public function listarOcompraPorAprobadoEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_ocompra
                                             WHERE ESTADO_REGISTRO = 1 
                                             AND ID_EMPRESA = '".$IDEMPRESA."' 
                                             AND ID_PLANTA = '".$IDPLANTA."'
                                             AND ID_TEMPORADA = '".$IDTEMPORADA."' 
                                             AND ESTADO_OCOMPRA = '4'  ;	");
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

    public function listarOcompraPorEmpresaPlantaTemporada2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',
                                                DATE_FORMAT(FECHA_OCOMPRA, '%d-%m-%Y') AS 'FECHA',
                                                FORMAT(IFNULL(TOTAL_CANTIDAD_OCOMPRA,0),0,'de_DE') AS 'CANTIDAD',
                                                FORMAT(IFNULL(TOTAL_VALOR_OCOMPRA,0),2,'de_DE') AS 'TOTAL_VALOR'
                                             FROM material_ocompra
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

    public function listarOcompraPorConfirmadoEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_ocompra
                                             WHERE ESTADO_REGISTRO = 1 
                                             AND ID_EMPRESA = '".$IDEMPRESA."' 
                                             AND ID_TEMPORADA = '".$IDTEMPORADA."'  
                                             AND ESTADO_OCOMPRA = 2;	");
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

    public function listarOcompraPorConfirmadoEmpresaTemporada2CBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',
                                                DATE_FORMAT(FECHA_OCOMPRA, '%d-%m-%Y') AS 'FECHA',
                                                FORMAT(IFNULL(TOTAL_CANTIDAD_OCOMPRA,0),0,'de_DE') AS 'CANTIDAD',
                                                FORMAT(IFNULL(TOTAL_VALOR_OCOMPRA,0),2,'de_DE') AS 'TOTAL_VALOR'
                                             FROM material_ocompra
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'
                                                AND ESTADO_OCOMPRA = 2  ;	");
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
    public function listarOcompraPorConfirmadoEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_ocompra
                                             WHERE ESTADO_REGISTRO = 1 
                                             AND ID_EMPRESA = '".$IDEMPRESA."' 
                                             AND ID_PLANTA = '".$IDPLANTA."'
                                             AND ID_TEMPORADA = '".$IDTEMPORADA."'  
                                             AND ESTADO_OCOMPRA = 2;	");
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
    public function listarOcompraPorConfirmadoEmpresaPlantaTemporada2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',
                                                DATE_FORMAT(FECHA_OCOMPRA, '%d-%m-%Y') AS 'FECHA',
                                                FORMAT(IFNULL(TOTAL_CANTIDAD_OCOMPRA,0),0,'de_DE') AS 'CANTIDAD',
                                                FORMAT(IFNULL(TOTAL_VALOR_OCOMPRA,0),2,'de_DE') AS 'TOTAL_VALOR'
                                             FROM material_ocompra
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'
                                                AND ESTADO_OCOMPRA = 2  ;	");
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


    //TOTALES

    public function obtenerTotalesOcompraPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                                IFNULL(SUM(TOTAL_CANTIDAD_OCOMPRA),0) AS 'CANTIDAD',
                                                IFNULL(SUM(TOTAL_VALOR_OCOMPRA),0) AS 'VALOR_TOTAL'
                                            FROM material_ocompra
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
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


    public function obtenerTotalesOcompraPorEmpresaTemporada2CBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(TOTAL_CANTIDAD_OCOMPRA),0),0,'de_DE') AS 'CANTIDAD',
                                                FORMAT(IFNULL(SUM(TOTAL_VALOR_OCOMPRA),0),2,'de_DE') AS 'VALOR_TOTAL'
                                             FROM material_ocompra
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
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


    public function obtenerTotalesOcompraPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                                IFNULL(SUM(TOTAL_CANTIDAD_OCOMPRA),0) AS 'CANTIDAD',
                                                IFNULL(SUM(TOTAL_VALOR_OCOMPRA),0) AS 'VALOR_TOTAL'
                                            FROM material_ocompra
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
    public function obtenerTotalesOcompraPorEmpresaPlantaTemporada2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(TOTAL_CANTIDAD_OCOMPRA),0),0,'de_DE') AS 'CANTIDAD',
                                                FORMAT(IFNULL(SUM(TOTAL_VALOR_OCOMPRA),0),2,'de_DE') AS 'VALOR_TOTAL'
                                             FROM material_ocompra
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

    
    public function obtenerTotalesOcompraPorConfirmarEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                                IFNULL(SUM(TOTAL_CANTIDAD_OCOMPRA),0) AS 'CANTIDAD',
                                                IFNULL(SUM(TOTAL_VALOR_OCOMPRA),0) AS 'VALOR_TOTAL'
                                            FROM material_ocompra
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
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
    public function obtenerTotalesOcompraPorConfirmarEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                                IFNULL(SUM(TOTAL_CANTIDAD_OCOMPRA),0) AS 'CANTIDAD',
                                                IFNULL(SUM(TOTAL_VALOR_OCOMPRA),0) AS 'VALOR_TOTAL'
                                            FROM material_ocompra
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
    public function obtenerTotalesOcompraPorConfirmarEmpresaTemporada2CBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(TOTAL_CANTIDAD_OCOMPRA),0),0,'de_DE') AS 'CANTIDAD' ,
                                                FORMAT(IFNULL(SUM(TOTAL_VALOR_OCOMPRA),0),2,'de_DE') AS 'VALOR_TOTAL'
                                             FROM material_ocompra
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."' 
                                                AND ESTADO_OCOMPRA = 2   ;	");
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
    public function obtenerTotalesOcompraPorConfirmarEmpresaPlantaTemporada2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(TOTAL_CANTIDAD_OCOMPRA),0),0,'de_DE') AS 'CANTIDAD' ,
                                                FORMAT(IFNULL(SUM(TOTAL_VALOR_OCOMPRA),0),2,'de_DE') AS 'VALOR_TOTAL'
                                             FROM material_ocompra
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."' 
                                                AND ESTADO_OCOMPRA = 2   ;	");
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