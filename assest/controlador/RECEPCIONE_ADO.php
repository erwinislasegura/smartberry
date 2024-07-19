<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/RECEPCIONE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class RECEPCIONE_ADO {
    
    
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
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_recepcione  limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_recepcione  WHERE ESTADO_REGISTRO = 1;	");
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
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_recepcione  WHERE ESTADO_REGISTRO = 0;	");
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
            
            $datos=$this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM  material_recepcione  
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
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION' ,
                                                DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y') AS 'FECHA' 
                                            FROM  material_recepcione  
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
  
    public function verRecepcion2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                FECHA_RECEPCION AS 'FECHA' 
                                            FROM  material_recepcione  
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
    public function agregarRecepcion(RECEPCIONE $RECEPCIONE){
        try{
            
            if($RECEPCIONE->__GET('ID_PROVEEDOR')==NULL){
                $RECEPCIONE->__SET('ID_PROVEEDOR', NULL);
            }
            if($RECEPCIONE->__GET('ID_OCOMPRA')==NULL){
                $RECEPCIONE->__SET('ID_OCOMPRA', NULL);
            }
            if($RECEPCIONE->__GET('ID_PLANTA2')==NULL){
                $RECEPCIONE->__SET('ID_PLANTA2', NULL);
            }
            if($RECEPCIONE->__GET('ID_PRODUCTOR')==NULL){
                $RECEPCIONE->__SET('ID_PRODUCTOR', NULL);
            }
            if($RECEPCIONE->__GET('ID_RECEPCIONMP')==NULL){
                $RECEPCIONE->__SET('ID_RECEPCIONMP', NULL);
            }
            $query=
            "INSERT INTO  material_recepcione  (
                                                     NUMERO_RECEPCION ,
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
                                                     ESTADO_REGISTRO 
                                                ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?, ?,  SYSDATE() , SYSDATE(), 0,  1, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RECEPCIONE->__GET('NUMERO_RECEPCION')  ,   
                    $RECEPCIONE->__GET('FECHA_RECEPCION')  ,    
                    $RECEPCIONE->__GET('TRECEPCION')  ,        
                    $RECEPCIONE->__GET('SNOCOMPRA')  ,   
                    $RECEPCIONE->__GET('NUMERO_DOCUMENTO_RECEPCION')  ,       
                    $RECEPCIONE->__GET('PATENTE_CAMION')  ,       
                    $RECEPCIONE->__GET('PATENTE_CARRO')  ,        
                    $RECEPCIONE->__GET('OBSERVACIONES_RECEPCION')  ,     
                    $RECEPCIONE->__GET('ID_EMPRESA')  ,  
                    $RECEPCIONE->__GET('ID_PLANTA')  ,  
                    $RECEPCIONE->__GET('ID_TEMPORADA')  ,  
                    $RECEPCIONE->__GET('ID_BODEGA')  ,     
                    $RECEPCIONE->__GET('ID_TDOCUMENTO')  ,       
                    $RECEPCIONE->__GET('ID_TRANSPORTE')  ,       
                    $RECEPCIONE->__GET('ID_CONDUCTOR')  ,          
                    $RECEPCIONE->__GET('ID_PROVEEDOR')  ,         
                    $RECEPCIONE->__GET('ID_OCOMPRA')  ,     
                    $RECEPCIONE->__GET('ID_PLANTA2')  ,       
                    $RECEPCIONE->__GET('ID_PRODUCTOR')    ,        
                    $RECEPCIONE->__GET('ID_USUARIOI')  ,       
                    $RECEPCIONE->__GET('ID_USUARIOM')      
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    } 
    public function agregarRecepcionMateriaPrima(RECEPCIONE $RECEPCIONE){
        try{
            
            if($RECEPCIONE->__GET('ID_PROVEEDOR')==NULL){
                $RECEPCIONE->__SET('ID_PROVEEDOR', NULL);
            }
            if($RECEPCIONE->__GET('ID_OCOMPRA')==NULL){
                $RECEPCIONE->__SET('ID_OCOMPRA', NULL);
            }
            if($RECEPCIONE->__GET('ID_PLANTA2')==NULL){
                $RECEPCIONE->__SET('ID_PLANTA2', NULL);
            }
            if($RECEPCIONE->__GET('ID_PRODUCTOR')==NULL){
                $RECEPCIONE->__SET('ID_PRODUCTOR', NULL);
            }
            if($RECEPCIONE->__GET('ID_RECEPCIONMP')==NULL){
                $RECEPCIONE->__SET('ID_RECEPCIONMP', NULL);
            }
            $query=
            "INSERT INTO  material_recepcione  (
                                                     NUMERO_RECEPCION ,
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
                                                     ID_RECEPCIONMP ,
                                                     ID_USUARIOI ,
                                                     ID_USUARIOM ,
                                                     INGRESO ,
                                                     MODIFICACION ,
                                                     TOTAL_CANTIDAD_RECEPCION ,
                                                     ESTADO ,
                                                     ESTADO_REGISTRO 
                                                ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?, ?,  SYSDATE() , SYSDATE(), 0,  1, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RECEPCIONE->__GET('NUMERO_RECEPCION')  ,   
                    $RECEPCIONE->__GET('FECHA_RECEPCION')  ,    
                    $RECEPCIONE->__GET('TRECEPCION')  ,        
                    $RECEPCIONE->__GET('SNOCOMPRA')  ,   
                    $RECEPCIONE->__GET('NUMERO_DOCUMENTO_RECEPCION')  ,       
                    $RECEPCIONE->__GET('PATENTE_CAMION')  ,       
                    $RECEPCIONE->__GET('PATENTE_CARRO')  ,        
                    $RECEPCIONE->__GET('OBSERVACIONES_RECEPCION')  ,     
                    $RECEPCIONE->__GET('ID_EMPRESA')  ,  
                    $RECEPCIONE->__GET('ID_PLANTA')  ,  
                    $RECEPCIONE->__GET('ID_TEMPORADA')  ,  
                    $RECEPCIONE->__GET('ID_BODEGA')  ,     
                    $RECEPCIONE->__GET('ID_TDOCUMENTO')  ,       
                    $RECEPCIONE->__GET('ID_TRANSPORTE')  ,       
                    $RECEPCIONE->__GET('ID_CONDUCTOR')  ,          
                    $RECEPCIONE->__GET('ID_PROVEEDOR')  ,         
                    $RECEPCIONE->__GET('ID_OCOMPRA')  ,     
                    $RECEPCIONE->__GET('ID_PLANTA2')  ,       
                    $RECEPCIONE->__GET('ID_PRODUCTOR')    ,   
                    $RECEPCIONE->__GET('ID_RECEPCIONMP')    ,      
                    $RECEPCIONE->__GET('ID_USUARIOI')  ,       
                    $RECEPCIONE->__GET('ID_USUARIOM')      
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    } 
    
    public function agregarRecepcionIndustrial(RECEPCIONE $RECEPCIONE){
        try{
            
            if($RECEPCIONE->__GET('ID_PROVEEDOR')==NULL){
                $RECEPCIONE->__SET('ID_PROVEEDOR', NULL);
            }
            if($RECEPCIONE->__GET('ID_OCOMPRA')==NULL){
                $RECEPCIONE->__SET('ID_OCOMPRA', NULL);
            }
            if($RECEPCIONE->__GET('ID_PLANTA2')==NULL){
                $RECEPCIONE->__SET('ID_PLANTA2', NULL);
            }
            if($RECEPCIONE->__GET('ID_PRODUCTOR')==NULL){
                $RECEPCIONE->__SET('ID_PRODUCTOR', NULL);
            }
            if($RECEPCIONE->__GET('ID_RECEPCIONMP')==NULL){
                $RECEPCIONE->__SET('ID_RECEPCIONMP', NULL);
            }
            $query=
            "INSERT INTO  material_recepcione  (
                                                     NUMERO_RECEPCION ,
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
                                                     ID_RECEPCIONIND ,
                                                     ID_USUARIOI ,
                                                     ID_USUARIOM ,
                                                     INGRESO ,
                                                     MODIFICACION ,
                                                     TOTAL_CANTIDAD_RECEPCION ,
                                                     ESTADO ,
                                                     ESTADO_REGISTRO 
                                                ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?, ?,  SYSDATE() , SYSDATE(), 0,  1, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RECEPCIONE->__GET('NUMERO_RECEPCION')  ,   
                    $RECEPCIONE->__GET('FECHA_RECEPCION')  ,    
                    $RECEPCIONE->__GET('TRECEPCION')  ,        
                    $RECEPCIONE->__GET('SNOCOMPRA')  ,   
                    $RECEPCIONE->__GET('NUMERO_DOCUMENTO_RECEPCION')  ,       
                    $RECEPCIONE->__GET('PATENTE_CAMION')  ,       
                    $RECEPCIONE->__GET('PATENTE_CARRO')  ,        
                    $RECEPCIONE->__GET('OBSERVACIONES_RECEPCION')  ,     
                    $RECEPCIONE->__GET('ID_EMPRESA')  ,  
                    $RECEPCIONE->__GET('ID_PLANTA')  ,  
                    $RECEPCIONE->__GET('ID_TEMPORADA')  ,  
                    $RECEPCIONE->__GET('ID_BODEGA')  ,     
                    $RECEPCIONE->__GET('ID_TDOCUMENTO')  ,       
                    $RECEPCIONE->__GET('ID_TRANSPORTE')  ,       
                    $RECEPCIONE->__GET('ID_CONDUCTOR')  ,          
                    $RECEPCIONE->__GET('ID_PROVEEDOR')  ,         
                    $RECEPCIONE->__GET('ID_OCOMPRA')  ,     
                    $RECEPCIONE->__GET('ID_PLANTA2')  ,       
                    $RECEPCIONE->__GET('ID_PRODUCTOR')    ,   
                    $RECEPCIONE->__GET('ID_RECEPCIONIND')    ,      
                    $RECEPCIONE->__GET('ID_USUARIOI')  ,       
                    $RECEPCIONE->__GET('ID_USUARIOM')      
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    } 
     
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarRecepcion($id){
        try{$sql="DELETE FROM  material_recepcione  WHERE  ID_RECEPCION =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }      
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarRecepcion(RECEPCIONE $RECEPCIONE){
        try{
            if($RECEPCIONE->__GET('ID_PROVEEDOR')==NULL){
                $RECEPCIONE->__SET('ID_PROVEEDOR', NULL);
            }
            if($RECEPCIONE->__GET('ID_OCOMPRA')==NULL){
                $RECEPCIONE->__SET('ID_OCOMPRA', NULL);
            }
            if($RECEPCIONE->__GET('ID_PLANTA2')==NULL){
                $RECEPCIONE->__SET('ID_PLANTA2', NULL);
            }
            if($RECEPCIONE->__GET('ID_PRODUCTOR')==NULL){
                $RECEPCIONE->__SET('ID_PRODUCTOR', NULL);
            }
            $query = "
                UPDATE  material_recepcione  SET
                    MODIFICACION = SYSDATE(),
                    FECHA_RECEPCION = ?,
                    TRECEPCION = ?,
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
                    ID_USUARIOM = ?     
                WHERE  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(   
                        $RECEPCIONE->__GET('FECHA_RECEPCION')  ,    
                        $RECEPCIONE->__GET('TRECEPCION')  ,    
                        $RECEPCIONE->__GET('NUMERO_DOCUMENTO_RECEPCION')  ,    
                        $RECEPCIONE->__GET('PATENTE_CAMION')  ,       
                        $RECEPCIONE->__GET('PATENTE_CARRO')  ,        
                        $RECEPCIONE->__GET('OBSERVACIONES_RECEPCION')  ,    
                        $RECEPCIONE->__GET('TOTAL_CANTIDAD_RECEPCION')  ,    
                        $RECEPCIONE->__GET('ID_BODEGA')  ,     
                        $RECEPCIONE->__GET('ID_TDOCUMENTO')  ,       
                        $RECEPCIONE->__GET('ID_TRANSPORTE')  ,       
                        $RECEPCIONE->__GET('ID_CONDUCTOR')  ,         
                        $RECEPCIONE->__GET('ID_PROVEEDOR')  ,         
                        $RECEPCIONE->__GET('ID_OCOMPRA')  ,     
                        $RECEPCIONE->__GET('ID_PLANTA2')  ,       
                        $RECEPCIONE->__GET('ID_PRODUCTOR')  ,      
                        $RECEPCIONE->__GET('ID_USUARIOM') ,     
                        $RECEPCIONE->__GET('ID_RECEPCION')
                        
                    )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    

    public function actualizarRecepcionMateriaPrima(RECEPCIONE $RECEPCIONE){
        try{
            if($RECEPCIONE->__GET('ID_PROVEEDOR')==NULL){
                $RECEPCIONE->__SET('ID_PROVEEDOR', NULL);
            }
            if($RECEPCIONE->__GET('ID_OCOMPRA')==NULL){
                $RECEPCIONE->__SET('ID_OCOMPRA', NULL);
            }
            if($RECEPCIONE->__GET('ID_PLANTA2')==NULL){
                $RECEPCIONE->__SET('ID_PLANTA2', NULL);
            }
            if($RECEPCIONE->__GET('ID_PRODUCTOR')==NULL){
                $RECEPCIONE->__SET('ID_PRODUCTOR', NULL);
            }
            $query = "
                UPDATE  material_recepcione  SET
                    MODIFICACION = SYSDATE(),
                    FECHA_RECEPCION = ?,
                    TRECEPCION = ?,
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
                    ID_USUARIOM = ?     
                WHERE  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(   
                        $RECEPCIONE->__GET('FECHA_RECEPCION')  ,    
                        $RECEPCIONE->__GET('TRECEPCION')  ,    
                        $RECEPCIONE->__GET('NUMERO_DOCUMENTO_RECEPCION')  ,    
                        $RECEPCIONE->__GET('PATENTE_CAMION')  ,       
                        $RECEPCIONE->__GET('PATENTE_CARRO')  ,        
                        $RECEPCIONE->__GET('OBSERVACIONES_RECEPCION')  ,    
                        $RECEPCIONE->__GET('TOTAL_CANTIDAD_RECEPCION')  ,  
                        $RECEPCIONE->__GET('ID_BODEGA')  ,     
                        $RECEPCIONE->__GET('ID_TDOCUMENTO')  ,       
                        $RECEPCIONE->__GET('ID_TRANSPORTE')  ,       
                        $RECEPCIONE->__GET('ID_CONDUCTOR')  ,         
                        $RECEPCIONE->__GET('ID_PROVEEDOR')  ,         
                        $RECEPCIONE->__GET('ID_OCOMPRA')  ,     
                        $RECEPCIONE->__GET('ID_PLANTA2')  ,       
                        $RECEPCIONE->__GET('ID_PRODUCTOR')  ,      
                        $RECEPCIONE->__GET('ID_USUARIOM') ,     
                        $RECEPCIONE->__GET('ID_RECEPCION')
                        
                    )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    public function actualizarRecepcionIndustrial(RECEPCIONE $RECEPCIONE){
        try{
            if($RECEPCIONE->__GET('ID_PROVEEDOR')==NULL){
                $RECEPCIONE->__SET('ID_PROVEEDOR', NULL);
            }
            if($RECEPCIONE->__GET('ID_OCOMPRA')==NULL){
                $RECEPCIONE->__SET('ID_OCOMPRA', NULL);
            }
            if($RECEPCIONE->__GET('ID_PLANTA2')==NULL){
                $RECEPCIONE->__SET('ID_PLANTA2', NULL);
            }
            if($RECEPCIONE->__GET('ID_PRODUCTOR')==NULL){
                $RECEPCIONE->__SET('ID_PRODUCTOR', NULL);
            }
            $query = "
                UPDATE  material_recepcione  SET
                    MODIFICACION = SYSDATE(),
                    FECHA_RECEPCION = ?,
                    TRECEPCION = ?,
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
                    ID_USUARIOM = ?     
                WHERE  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(   
                        $RECEPCIONE->__GET('FECHA_RECEPCION')  ,    
                        $RECEPCIONE->__GET('TRECEPCION')  ,    
                        $RECEPCIONE->__GET('NUMERO_DOCUMENTO_RECEPCION')  ,    
                        $RECEPCIONE->__GET('PATENTE_CAMION')  ,       
                        $RECEPCIONE->__GET('PATENTE_CARRO')  ,        
                        $RECEPCIONE->__GET('OBSERVACIONES_RECEPCION')  ,    
                        $RECEPCIONE->__GET('TOTAL_CANTIDAD_RECEPCION')  ,  
                        $RECEPCIONE->__GET('ID_BODEGA')  ,     
                        $RECEPCIONE->__GET('ID_TDOCUMENTO')  ,       
                        $RECEPCIONE->__GET('ID_TRANSPORTE')  ,       
                        $RECEPCIONE->__GET('ID_CONDUCTOR')  ,         
                        $RECEPCIONE->__GET('ID_PROVEEDOR')  ,         
                        $RECEPCIONE->__GET('ID_OCOMPRA')  ,     
                        $RECEPCIONE->__GET('ID_PLANTA2')  ,       
                        $RECEPCIONE->__GET('ID_PRODUCTOR')  ,      
                        $RECEPCIONE->__GET('ID_USUARIOM') ,     
                        $RECEPCIONE->__GET('ID_RECEPCION')
                        
                    )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS 


    public function cerrarActualizarcantidad(RECEPCIONE $RECEPCIONE){

        try{
            $query = "
            UPDATE  material_recepcione  SET			
                MODIFICACION = SYSDATE(),		
                        TOTAL_CANTIDAD_RECEPCION  = ?,		
                        ESTADO  = 0
            WHERE  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RECEPCIONE->__GET('TOTAL_CANTIDAD_RECEPCION') ,
                    $RECEPCIONE->__GET('ID_RECEPCION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //CAMBIO DE ESTADO 
    //CAMBIO A CERRADO
    public function cerrado(RECEPCIONE $RECEPCIONE){

        try{
            $query = "
            UPDATE  material_recepcione  SET			
                MODIFICACION = SYSDATE(),		
                        ESTADO  = 0
            WHERE  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RECEPCIONE->__GET('ID_RECEPCION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ABIERTO
    public function abierto(RECEPCIONE $RECEPCIONE){
        try{
            $query = "
    UPDATE  material_recepcione  SET				
     MODIFICACION = SYSDATE(),	
             ESTADO  = 1
    WHERE  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RECEPCIONE->__GET('ID_RECEPCION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(RECEPCIONE $RECEPCIONE){

        try{
            $query = "
    UPDATE  material_recepcione  SET			
     MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 0
    WHERE  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RECEPCIONE->__GET('ID_RECEPCION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(RECEPCIONE $RECEPCIONE){
        try{
            $query = "
    UPDATE  material_recepcione  SET				
     MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 1
    WHERE  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RECEPCIONE->__GET('ID_RECEPCION')                    
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
                                            FROM  material_recepcione 
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
                                                FROM  material_recepcione 
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

    
    public function listarRecepcionPorRecepcionMpCBX($IDRECEPCIONMP){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM  material_recepcione  
                                            WHERE ESTADO_REGISTRO = 1
                                            AND ID_RECEPCIONMP= '".$IDRECEPCIONMP."';	");
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
    
    public function listarRecepcionPorRecepcionINDCBX($IDRECEPCIONIND){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM  material_recepcione  
                                            WHERE ESTADO_REGISTRO = 1
                                            AND ID_RECEPCIONIND= '".$IDRECEPCIONIND."';	");
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
    public function listarRecepcionCerradoPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                        FECHA_RECEPCION AS 'FECHA',
                                                        WEEK(FECHA_RECEPCION,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_RECEPCION) AS 'SEMANAISO',
                                                        IFNULL( TOTAL_CANTIDAD_RECEPCION ,0) AS 'CANTIDAD' 
                                             FROM  material_recepcione 
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
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                        FECHA_RECEPCION AS 'FECHA',
                                                        WEEK(FECHA_RECEPCION,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_RECEPCION) AS 'SEMANAISO',
                                                        IFNULL( TOTAL_CANTIDAD_RECEPCION ,0) AS 'CANTIDAD' 
                                             FROM  material_recepcione 
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
    
    public function listarRecepcionPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y') AS 'FECHA',
                                            IFNULL( TOTAL_CANTIDAD_RECEPCION ,0) AS 'CANTIDAD' 
                                             FROM  material_recepcione 
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
    public function listarRecepcionPorEmpresaPlantaTemporada2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y') AS 'FECHA',
                                                FORMAT(IFNULL( TOTAL_CANTIDAD_RECEPCION ,0),0,'de_DE') AS 'CANTIDAD' 
                                             FROM  material_recepcione 
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
    //TOTALES

    public function obtenerTotalesRecepcionPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                IFNULL(SUM( TOTAL_CANTIDAD_RECEPCION ),0) AS 'CANTIDAD'
                                            FROM  material_recepcione 
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

    public function obtenerTotalesRecepcionPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT  
                                                IFNULL(SUM( TOTAL_CANTIDAD_RECEPCION ),0) AS 'CANTIDAD'
                                            FROM  material_recepcione 
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
    public function obtenerTotalesRecepcionPorEmpresaTemporada2CBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM( TOTAL_CANTIDAD_RECEPCION ),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM  material_recepcione 
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
    public function obtenerTotalesRecepcionPorEmpresaPlantaTemporada2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM( TOTAL_CANTIDAD_RECEPCION ),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM  material_recepcione 
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

}
?>