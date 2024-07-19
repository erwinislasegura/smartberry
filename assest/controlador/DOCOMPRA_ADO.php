<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DOCOMPRA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class DOCOMPRA_ADO {
    
    
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
    public function listarDocompra(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_docompra` limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarDocompraCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_docompra` WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarDocompra2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_docompra` WHERE ESTADO_REGISTRO = 0;	");
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
    public function verDocompra($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_docompra` WHERE `ID_DOCOMPRA`= '".$ID."';");
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

    public function verDocompra2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM `material_docompra` 
                                                WHERE `ID_DOCOMPRA`= '".$ID."';");
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

    public function agregarDocompra(DOCOMPRA $DOCOMPRA){
        try{      

         
            $query=
                "INSERT INTO `material_docompra` (   
                                                        `CANTIDAD_DOCOMPRA`,
                                                        `VALOR_UNITARIO_DOCOMPRA`,   
                                                        `ID_PRODUCTO`,
                                                        `ID_TUMEDIDA`,
                                                        `ID_OCOMPRA`,     
                                                        `INGRESO`,
                                                        `MODIFICACION`,   
                                                        `CANTIDAD_INGRESADA_DOCOMPRA`,  
                                                        `ESTADO`,
                                                        `ESTADO_REGISTRO`
                                                    ) VALUES
	       	( ?, ?, ?, ?, ?,   SYSDATE() , SYSDATE(), 0, 1, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                   
                    $DOCOMPRA->__GET('CANTIDAD_DOCOMPRA')  ,  
                    $DOCOMPRA->__GET('VALOR_UNITARIO_DOCOMPRA')  ,   
                    $DOCOMPRA->__GET('ID_PRODUCTO')  ,  
                    $DOCOMPRA->__GET('ID_TUMEDIDA')  ,     
                    $DOCOMPRA->__GET('ID_OCOMPRA')    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }   
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDocompra($id){
        try{$sql="DELETE FROM `material_docompra` WHERE `ID_DOCOMPRA`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }      
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDocompra(DOCOMPRA $DOCOMPRA){
        try{
          
            $query = "
		UPDATE `material_docompra` SET
            `MODIFICACION`= SYSDATE(),
            `CANTIDAD_DOCOMPRA`= ?,
            `VALOR_UNITARIO_DOCOMPRA`= ?,
            `ID_PRODUCTO`= ?,
            `ID_TUMEDIDA`= ?,
            `ID_OCOMPRA`= ?    
		WHERE `ID_DOCOMPRA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(      
                    $DOCOMPRA->__GET('CANTIDAD_DOCOMPRA')  ,  
                    $DOCOMPRA->__GET('VALOR_UNITARIO_DOCOMPRA')  ,   
                    $DOCOMPRA->__GET('ID_PRODUCTO')  ,  
                    $DOCOMPRA->__GET('ID_TUMEDIDA')  ,     
                    $DOCOMPRA->__GET('ID_OCOMPRA') ,   
                    $DOCOMPRA->__GET('ID_DOCOMPRA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    

    public function actualizarCantidadIngresada(DOCOMPRA $DOCOMPRA){
        try{
           
            $query = "
		UPDATE `material_docompra` SET
            `MODIFICACION`= SYSDATE(),
            `CANTIDAD_INGRESADA_DOCOMPRA`= ?  
		WHERE `ID_DOCOMPRA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(      
                    $DOCOMPRA->__GET('CANTIDAD_INGRESADA_DOCOMPRA')  ,  
                    $DOCOMPRA->__GET('ID_DOCOMPRA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 

    //CAMBIO DE ESTADO 
    //CAMBIO A CERRADO
    public function cerrado(DOCOMPRA $DOCOMPRA){

        try{
            $query = "
    UPDATE `material_docompra` SET			
            `MODIFICACION`= SYSDATE(),		
            `ESTADO` = 0
    WHERE `ID_DOCOMPRA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DOCOMPRA->__GET('ID_DOCOMPRA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ABIERTO
    public function abierto(DOCOMPRA $DOCOMPRA){
        try{
            $query = "
    UPDATE `material_docompra` SET				
            `MODIFICACION`= SYSDATE(),	
            `ESTADO` = 1
    WHERE `ID_DOCOMPRA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DOCOMPRA->__GET('ID_DOCOMPRA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DOCOMPRA $DOCOMPRA){

        try{
            $query = "
    UPDATE `material_docompra` SET			
            `MODIFICACION`= SYSDATE(),		
            `ESTADO_REGISTRO` = 0
    WHERE `ID_DOCOMPRA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DOCOMPRA->__GET('ID_DOCOMPRA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function deshabilitar2(DOCOMPRA $DOCOMPRA){

        try{
            $query = "
    UPDATE `material_docompra` SET			
            `MODIFICACION`= SYSDATE(),		
            `ESTADO_REGISTRO` = 0
    WHERE `FOLIO_DOCOMPRA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DOCOMPRA->__GET('FOLIO_DOCOMPRA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DOCOMPRA $DOCOMPRA){
        try{
            $query = "
    UPDATE `material_docompra` SET				
            `MODIFICACION`= SYSDATE(),	
            `ESTADO_REGISTRO` = 1
    WHERE `ID_DOCOMPRA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DOCOMPRA->__GET('ID_DOCOMPRA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }




    //LISTAS

    public function listarDocompraPorRecepcionECBX($IDRECEPCION){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM `material_docompra`
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCIONE = '".$IDRECEPCION."'  ;
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
  
    public function listarDocompraPorOcompraCBX($IDOCOMPRA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                IFNULL(`CANTIDAD_DOCOMPRA`,0) AS 'CANTIDAD', 
                                                IFNULL(`VALOR_UNITARIO_DOCOMPRA`,0) AS 'VALOR' ,
                                                IFNULL(`VALOR_UNITARIO_DOCOMPRA` * `CANTIDAD_DOCOMPRA`,0) AS 'TOTAL' 
                                             FROM `material_docompra`
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_OCOMPRA = '".$IDOCOMPRA."'  ;	");
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
    public function listarDocompraPorOcompra2CBX($IDOCOMPRA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                FORMAT(IFNULL(`CANTIDAD_DOCOMPRA`,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(`VALOR_UNITARIO_DOCOMPRA`,0),4,'de_DE') AS 'VALOR' ,
                                                FORMAT(IFNULL(`VALOR_UNITARIO_DOCOMPRA` * `CANTIDAD_DOCOMPRA`,0),2,'de_DE') AS 'TOTAL' 
                                             FROM `material_docompra`
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_OCOMPRA = '".$IDOCOMPRA."'  ;	");
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

    public function obtenerTotalesDocompraPorOcompraCBX($IDOCOMPRA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                IFNULL(SUM(`CANTIDAD_DOCOMPRA`),0) AS 'CANTIDAD', 
                                                IFNULL(SUM(`VALOR_UNITARIO_DOCOMPRA`),0) AS 'VALOR_UNITARIO', 
                                                IFNULL(SUM(`VALOR_UNITARIO_DOCOMPRA` * `CANTIDAD_DOCOMPRA`),0) AS 'VALOR_TOTAL'
                                            FROM `material_docompra`
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_OCOMPRA = '".$IDOCOMPRA."'  ;	");
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
    public function obtenerTotalesDocompraPorOcompra2CBX($IDOCOMPRA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(`CANTIDAD_DOCOMPRA`),0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(SUM(`VALOR_UNITARIO_DOCOMPRA`),0),4,'de_DE') AS 'VALOR_UNITARIO' ,
                                                FORMAT(IFNULL(SUM(`VALOR_UNITARIO_DOCOMPRA` * `CANTIDAD_DOCOMPRA`),0),2,'de_DE') AS 'VALOR_TOTAL'  
                                             FROM `material_docompra`
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_OCOMPRA = '".$IDOCOMPRA."'  ;	");
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
