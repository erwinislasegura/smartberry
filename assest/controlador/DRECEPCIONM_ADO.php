<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DRECEPCIONM.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class DRECEPCIONM_ADO {
    
    
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
    public function listarDrecepcion(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_drecepcionm  limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarDrecepcionCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_drecepcionm  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarDrecepcion2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_drecepcionm  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verDrecepcion($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_drecepcionm  WHERE  ID_DRECEPCION = '".$ID."';");
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

    public function verDrecepcion2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM  material_drecepcionm  
                                                WHERE  ID_DRECEPCION = '".$ID."';");
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

    public function agregarDrecepcion(DRECEPCIONM $DRECEPCIONM){
        try{      
            $query=
                "INSERT INTO  material_drecepcionm  (   
                                                         CANTIDAD_DRECEPCION ,
                                                         VALOR_UNITARIO_DRECEPCION ,    
                                                         DESCRIPCION_DRECEPCION ,                                    
                                                         ID_RECEPCION ,
                                                         ID_PRODUCTO ,
                                                         ID_TUMEDIDA ,
                                                         INGRESO ,
                                                         MODIFICACION ,     
                                                         ESTADO ,
                                                         ESTADO_REGISTRO 
                                                    ) VALUES
	       	( ?, ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(),  1, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DRECEPCIONM->__GET('CANTIDAD_DRECEPCION')  ,  
                    $DRECEPCIONM->__GET('VALOR_UNITARIO_DRECEPCION')  ,   
                    $DRECEPCIONM->__GET('DESCRIPCION_DRECEPCION')  ,           
                    $DRECEPCIONM->__GET('ID_RECEPCION')  ,  
                    $DRECEPCIONM->__GET('ID_PRODUCTO')  ,  
                    $DRECEPCIONM->__GET('ID_TUMEDIDA')      
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }   
    
    public function agregarDrecepcionDocompra(DRECEPCIONM $DRECEPCIONM){
        try{      
            $query=
                "INSERT INTO  material_drecepcionm  (   
                                                         CANTIDAD_DRECEPCION ,
                                                         VALOR_UNITARIO_DRECEPCION ,    
                                                         DESCRIPCION_DRECEPCION ,                                    
                                                         ID_RECEPCION ,
                                                         ID_PRODUCTO ,
                                                         ID_TUMEDIDA ,
                                                         ID_DOCOMPRA ,
                                                         INGRESO ,
                                                         MODIFICACION ,     
                                                         ESTADO ,
                                                         ESTADO_REGISTRO 
                                                    ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(),  1, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DRECEPCIONM->__GET('CANTIDAD_DRECEPCION')  ,  
                    $DRECEPCIONM->__GET('VALOR_UNITARIO_DRECEPCION')  ,   
                    $DRECEPCIONM->__GET('DESCRIPCION_DRECEPCION')  ,           
                    $DRECEPCIONM->__GET('ID_RECEPCION')  ,  
                    $DRECEPCIONM->__GET('ID_PRODUCTO')  ,  
                    $DRECEPCIONM->__GET('ID_TUMEDIDA'),        
                    $DRECEPCIONM->__GET('ID_DOCOMPRA')    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }  
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDrecepcion($id){
        try{$sql="DELETE FROM  material_drecepcionm  WHERE  ID_DRECEPCION =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }      
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDrecepcion(DRECEPCIONM $DRECEPCIONM){
        try{
            $query = "
		UPDATE  material_drecepcionm  SET
             MODIFICACION = SYSDATE(),
             CANTIDAD_DRECEPCION = ?,
             VALOR_UNITARIO_DRECEPCION = ?,
             DESCRIPCION_DRECEPCION = ?,
             ID_RECEPCION = ?,
             ID_PRODUCTO = ?,
             ID_TUMEDIDA = ?  
		WHERE  ID_DRECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(      
                    $DRECEPCIONM->__GET('CANTIDAD_DRECEPCION')  ,  
                    $DRECEPCIONM->__GET('VALOR_UNITARIO_DRECEPCION')  ,   
                    $DRECEPCIONM->__GET('DESCRIPCION_DRECEPCION')  ,            
                    $DRECEPCIONM->__GET('ID_RECEPCION')  ,  
                    $DRECEPCIONM->__GET('ID_PRODUCTO')  ,   
                    $DRECEPCIONM->__GET('ID_TUMEDIDA')  ,       
                    $DRECEPCIONM->__GET('ID_DRECEPCION')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    public function actualizarDrecepcionDocompra(DRECEPCIONM $DRECEPCIONM){
        try{
            $query = "
		UPDATE  material_drecepcionm  SET
             MODIFICACION = SYSDATE(),
             CANTIDAD_DRECEPCION = ?,
             VALOR_UNITARIO_DRECEPCION = ?,
             DESCRIPCION_DRECEPCION = ?,
             ID_RECEPCION = ?,
             ID_PRODUCTO = ?,
             ID_TUMEDIDA = ?  ,
             ID_DOCOMPRA  = ? 
		WHERE  ID_DRECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(      
                    $DRECEPCIONM->__GET('CANTIDAD_DRECEPCION')  ,  
                    $DRECEPCIONM->__GET('VALOR_UNITARIO_DRECEPCION')  ,   
                    $DRECEPCIONM->__GET('DESCRIPCION_DRECEPCION')  ,            
                    $DRECEPCIONM->__GET('ID_RECEPCION')  ,  
                    $DRECEPCIONM->__GET('ID_PRODUCTO')  ,    
                    $DRECEPCIONM->__GET('ID_TUMEDIDA')  ,      
                    $DRECEPCIONM->__GET('ID_DOCOMPRA')  ,    
                    $DRECEPCIONM->__GET('ID_DRECEPCION')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS 

    public function buscarID($CANTIDADDRECEPCION, $DESCRIPCIONDRECEPCION,  $PRODUCTO,  $TUMEDIDA, $RECEPCION)
    {
        try {


            $datos = $this->conexion->prepare(" SELECT *
                                            FROM  material_drecepcionm 
                                            WHERE 
                                                 CANTIDAD_DRECEPCION = '" . $CANTIDADDRECEPCION . "'
                                                 AND DESCRIPCION_DRECEPCION LIKE '" . $DESCRIPCIONDRECEPCION . "'  
                                                 AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                 AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')  
                                                 AND ID_PRODUCTO = " . $PRODUCTO . " 
                                                 AND ID_TUMEDIDA = " . $TUMEDIDA . " 
                                                 AND ID_RECEPCION = " . $RECEPCION . " 
                                            ORDER BY ID_DRECEPCION DESC
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



    //CAMBIO DE ESTADO 
    //CAMBIO A CERRADO
    public function cerrado(DRECEPCIONM $DRECEPCIONM){

        try{
            $query = "
    UPDATE  material_drecepcionm  SET			
             MODIFICACION = SYSDATE(),		
             ESTADO  = 0
    WHERE  ID_DRECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DRECEPCIONM->__GET('ID_DRECEPCION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ABIERTO
    public function abierto(DRECEPCIONM $DRECEPCIONM){
        try{
            $query = "
    UPDATE  material_drecepcionm  SET				
             MODIFICACION = SYSDATE(),	
             ESTADO  = 1
    WHERE  ID_DRECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DRECEPCIONM->__GET('ID_DRECEPCION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DRECEPCIONM $DRECEPCIONM){

        try{
            $query = "
    UPDATE  material_drecepcionm  SET			
             MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 0
    WHERE  ID_DRECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DRECEPCIONM->__GET('ID_DRECEPCION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function deshabilitar2(DRECEPCIONM $DRECEPCIONM){

        try{
            $query = "
    UPDATE  material_drecepcionm  SET			
             MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 0
    WHERE  FOLIO_DRECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DRECEPCIONM->__GET('FOLIO_DRECEPCION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DRECEPCIONM $DRECEPCIONM){
        try{
            $query = "
    UPDATE  material_drecepcionm  SET				
             MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 1
    WHERE  ID_DRECEPCION = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DRECEPCIONM->__GET('ID_DRECEPCION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }




    //LISTAS

    public function listarDrecepcionPorDocompraCBX($IDRECEPCION, $IDDOCOMPRA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM  material_drecepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDRECEPCION."' 
                                                AND ID_DOCOMPRA = '".$IDDOCOMPRA."'  ;
                                        	");
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


    public function listarDrecepcionPorRecepcionCBX($IDRECEPCION){
        try{
            
            $datos=$this->conexion->prepare("SELECT *, 
                                                IFNULL( CANTIDAD_DRECEPCION ,0) AS 'CANTIDAD', 
                                                IFNULL( VALOR_UNITARIO_DRECEPCION ,0) AS 'VALOR_UNITARIO' 
                                            FROM  material_drecepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDRECEPCION."'  ;
                                        	");
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
    public function listarDrecepcionPorRecepcion2CBX($IDRECEPCION){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESOF',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACIONF',
                                                FORMAT(IFNULL( CANTIDAD_DRECEPCION ,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL( VALOR_UNITARIO_DRECEPCION ,0),5,'de_DE') AS 'VALOR_UNITARIO' 
                                             FROM  material_drecepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDRECEPCION."'  ;	");
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
    public function listarDrecepcionPorRecepcionSiDocompra2CBX($IDRECEPCION){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESOF',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACIONF',
                                                FORMAT(IFNULL( CANTIDAD_DRECEPCION ,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL( VALOR_UNITARIO_DRECEPCION ,0),5,'de_DE') AS 'VALOR_UNITARIO' 
                                             FROM  material_drecepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDRECEPCION."'   
                                                AND ID_DOCOMPRA IS NOT NULL;	");
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
    public function listarDrecepcionPorRecepcionNoDocompra2CBX($IDRECEPCION){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESOF',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACIONF',
                                                FORMAT(IFNULL( CANTIDAD_DRECEPCION ,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL( VALOR_UNITARIO_DRECEPCION ,0),5,'de_DE') AS 'VALOR_UNITARIO' 
                                             FROM  material_drecepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDRECEPCION."'  
                                                AND ID_DOCOMPRA IS NULL;	");
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

    public function obtenerTotalesDrecepcionPorRecepcionCBX($IDRECEPCION){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                IFNULL(SUM( CANTIDAD_DRECEPCION ),0) AS 'CANTIDAD', 
                                                IFNULL(SUM( VALOR_UNITARIO_DRECEPCION ),0) AS 'VALOR_UNITARIO' 
                                            FROM  material_drecepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDRECEPCION."'  ;	");
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
    public function obtenerTotalesDrecepcionPorRecepcion2CBX($IDRECEPCION){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM( CANTIDAD_DRECEPCION ),0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(SUM( VALOR_UNITARIO_DRECEPCION ),0),2,'de_DE') AS 'VALOR_UNITARIO'   
                                             FROM  material_drecepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDRECEPCION."'  ;	");
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

    
    public function listarDrecepcionPorRecepcionProductoTumedida2CBX($IDRECEPCION,$IDPRODUCTO,$IDTUMEDIDA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,                                              
                                                FORMAT(IFNULL( VALOR_UNITARIO_DRECEPCION ,0),5,'de_DE') AS 'VALOR_UNITARIO' 
                                             FROM  material_drecepcionm 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDRECEPCION."'  
                                                AND ID_PRODUCTO = '".$IDPRODUCTO."'
                                                AND ID_TUMEDIDA = '".$IDTUMEDIDA."';	");
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
