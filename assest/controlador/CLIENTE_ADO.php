<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/CLIENTE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class CLIENTE_ADO {
    
    
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
    public function listarCliente(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_cliente  limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarClienteCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_cliente  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarCliente2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_cliente  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verCliente($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_cliente  WHERE  ID_CLIENTE = '".$ID."';");
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

    public function agregarCliente(CLIENTE $CLIENTE){
        try{
            
            
            if($CLIENTE->__GET('ID_COMUNA')==NULL){
                $CLIENTE->__SET('ID_COMUNA', NULL);
            }
            $query=
            "INSERT INTO  material_cliente  ( 
                                               RUT_CLIENTE ,
                                               DV_CLIENTE ,
                                               RAZON_CLIENTE ,
                                               NUMERO_CLIENTE ,
                                               NOMBRE_CLIENTE ,
                                               GIRO_CLIENTE ,
                                               DIRECCION_CLIENTE ,
                                               TELEFONO_CLIENTE ,
                                               EMAIL_CLIENTE ,
                                               ID_EMPRESA ,
                                               ID_COMUNA ,
                                               ID_USUARIOI ,
                                               ID_USUARIOM ,
                                               INGRESO ,
                                               MODIFICACION , 
                                               ESTADO_REGISTRO ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(            
                    $CLIENTE->__GET('RUT_CLIENTE')  ,     
                    $CLIENTE->__GET('DV_CLIENTE')  , 
                    $CLIENTE->__GET('RAZON_CLIENTE')  ,
                    $CLIENTE->__GET('NUMERO_CLIENTE')  ,
                    $CLIENTE->__GET('NOMBRE_CLIENTE')  ,
                    $CLIENTE->__GET('GIRO_CLIENTE')  ,
                    $CLIENTE->__GET('DIRECCION_CLIENTE')  ,
                    $CLIENTE->__GET('TELEFONO_CLIENTE')  ,
                    $CLIENTE->__GET('EMAIL_CLIENTE')    ,
                    $CLIENTE->__GET('ID_EMPRESA')   ,
                    $CLIENTE->__GET('ID_COMUNA')  ,
                    $CLIENTE->__GET('ID_USUARIOI') ,
                    $CLIENTE->__GET('ID_USUARIOM')                      
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarCliente($id){
        try{$sql="DELETE FROM  material_cliente  WHERE  ID_CLIENTE =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarCliente(CLIENTE $CLIENTE){
        try{
            if($CLIENTE->__GET('ID_COMUNA')==NULL){
                $CLIENTE->__SET('ID_COMUNA', NULL);
            }
            $query = "
		UPDATE  material_cliente  SET
             MODIFICACION = SYSDATE(),
             RUT_CLIENTE = ?,
             DV_CLIENTE = ?,
             RAZON_CLIENTE = ?,
             NOMBRE_CLIENTE = ?,
             GIRO_CLIENTE = ?,
             DIRECCION_CLIENTE = ?,
             TELEFONO_CLIENTE = ?,
             EMAIL_CLIENTE = ?,
             ID_EMPRESA = ?  ,
             ID_COMUNA = ?  ,
             ID_USUARIOM = ?            
		WHERE  ID_CLIENTE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(   
                    $CLIENTE->__GET('RUT_CLIENTE')  ,     
                    $CLIENTE->__GET('DV_CLIENTE')  , 
                    $CLIENTE->__GET('RAZON_CLIENTE')  ,
                    $CLIENTE->__GET('NOMBRE_CLIENTE')  ,
                    $CLIENTE->__GET('GIRO_CLIENTE')  ,
                    $CLIENTE->__GET('DIRECCION_CLIENTE')  ,
                    $CLIENTE->__GET('TELEFONO_CLIENTE')  ,
                    $CLIENTE->__GET('EMAIL_CLIENTE')    ,
                    $CLIENTE->__GET('ID_EMPRESA')   ,
                    $CLIENTE->__GET('ID_COMUNA') ,
                    $CLIENTE->__GET('ID_USUARIOM') ,      
                    $CLIENTE->__GET('ID_CLIENTE')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(CLIENTE $CLIENTE){

        try{
            $query = "
    UPDATE  material_cliente  SET				
     MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 0
    WHERE  ID_CLIENTE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $CLIENTE->__GET('ID_CLIENTE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(CLIENTE $CLIENTE){
        try{
            $query = "
    UPDATE  material_cliente  SET			
     MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 1
    WHERE  ID_CLIENTE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $CLIENTE->__GET('ID_CLIENTE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarClientePorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_cliente  WHERE ESTADO_REGISTRO = 1  AND ID_EMPRESA = '".$IDEMPRESA."';	");
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
    public function obtenerNumero()
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                    IFNULL(COUNT(NUMERO_CLIENTE),0) AS 'NUMERO'
                                                FROM  material_cliente   ; ");
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