<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/PRODUCTO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class PRODUCTO_ADO {
    
    
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
    public function listarProducto(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_producto  limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarProductoCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_producto  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarProducto2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_producto  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verProducto($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_producto  WHERE  ID_PRODUCTO = '".$ID."';");
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

    public function agregarProducto(PRODUCTO $PRODUCTO){
        try{
            
            

            $query=
            "INSERT INTO  material_producto  (
                                               CODIGO_PRODUCTO ,
                                               NUMERO_PRODUCTO ,
                                               NOMBRE_PRODUCTO ,
                                               OPTIMO ,
                                               CRITICO ,
                                               BAJO ,
                                               ID_EMPRESA ,
                                               ID_TEMPORADA ,
                                               ID_TUMEDIDA ,
                                               ID_FAMILIA ,
                                               ID_SUBFAMILIA ,
                                               ID_ESPECIES ,
                                               ID_USUARIOI ,
                                               ID_USUARIOM ,
                                               INGRESO ,
                                               MODIFICACION , 
                                               ESTADO_REGISTRO ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,   SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(            
                    $PRODUCTO->__GET('CODIGO_PRODUCTO')  ,     
                    $PRODUCTO->__GET('NUMERO_PRODUCTO')  ,    
                    $PRODUCTO->__GET('NOMBRE_PRODUCTO')  , 
                    $PRODUCTO->__GET('OPTIMO')  ,
                    $PRODUCTO->__GET('CRITICO')  ,
                    $PRODUCTO->__GET('BAJO')  ,
                    $PRODUCTO->__GET('ID_EMPRESA')    ,
                    $PRODUCTO->__GET('ID_TEMPORADA')    ,
                    $PRODUCTO->__GET('ID_TUMEDIDA')   ,
                    $PRODUCTO->__GET('ID_FAMILIA')     ,
                    $PRODUCTO->__GET('ID_SUBFAMILIA')  ,
                    $PRODUCTO->__GET('ID_ESPECIES')    ,
                    $PRODUCTO->__GET('ID_USUARIOI')    ,
                    $PRODUCTO->__GET('ID_USUARIOM')                   
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarProducto($id){
        try{$sql="DELETE FROM  material_producto  WHERE  ID_PRODUCTO =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarProducto(PRODUCTO $PRODUCTO){
        try{
            $query = "
		UPDATE  material_producto  SET
             MODIFICACION = SYSDATE(),
             CODIGO_PRODUCTO = ?,
             NOMBRE_PRODUCTO = ?,
             OPTIMO = ?,
             CRITICO = ?,
             BAJO = ?,
             ID_EMPRESA = ?,
             ID_TEMPORADA = ?,
             ID_TUMEDIDA = ?  ,
             ID_FAMILIA = ?     ,      
             ID_SUBFAMILIA = ? ,      
             ID_ESPECIES = ? ,      
             ID_USUARIOM = ? 
		WHERE  ID_PRODUCTO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(   
                    $PRODUCTO->__GET('CODIGO_PRODUCTO')  ,     
                    $PRODUCTO->__GET('NOMBRE_PRODUCTO')  , 
                    $PRODUCTO->__GET('OPTIMO')  ,
                    $PRODUCTO->__GET('CRITICO')  ,
                    $PRODUCTO->__GET('BAJO')  ,
                    $PRODUCTO->__GET('ID_EMPRESA') ,
                    $PRODUCTO->__GET('ID_TEMPORADA') ,
                    $PRODUCTO->__GET('ID_TUMEDIDA')   ,
                    $PRODUCTO->__GET('ID_FAMILIA')  ,    
                    $PRODUCTO->__GET('ID_SUBFAMILIA')  ,  
                    $PRODUCTO->__GET('ID_ESPECIES') ,  
                    $PRODUCTO->__GET('ID_USUARIOM') ,    
                    $PRODUCTO->__GET('ID_PRODUCTO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(PRODUCTO $PRODUCTO){

        try{
            $query = "
    UPDATE  material_producto  SET			
     MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 0
    WHERE  ID_PRODUCTO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PRODUCTO->__GET('ID_PRODUCTO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(PRODUCTO $PRODUCTO){
        try{
            $query = "
    UPDATE  material_producto  SET		
     MODIFICACION = SYSDATE(),			
             ESTADO_REGISTRO  = 1
    WHERE  ID_PRODUCTO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PRODUCTO->__GET('ID_PRODUCTO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    public function obtenerNumero()
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                    IFNULL(COUNT(NUMERO_PRODUCTO),0) AS 'NUMERO'
                                                FROM  material_producto   ; ");
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


    public function listarProductoPorEmpresaCBX($IDEMPRESA, $ID_TEMPORADA){
        try{
            /*echo "SELECT * 
            FROM  material_producto  WHERE ESTADO_REGISTRO = 1  AND ID_EMPRESA = '".$IDEMPRESA."' AND ID_TEMPORADA = '".$ID_TEMPORADA."';	";*/
            $datos=$this->conexion->prepare("SELECT * 
                                                FROM  material_producto  WHERE ESTADO_REGISTRO = 1  AND ID_EMPRESA = '".$IDEMPRESA."' AND ID_TEMPORADA = '".$ID_TEMPORADA."';	");
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

    public function listarProductoPorEmpresaPorTemporadaCBX($IDEMPRESA, $IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                * 
                                            FROM  material_producto  
                                                WHERE ESTADO_REGISTRO = 1  
                                                AND ID_EMPRESA = '".$IDEMPRESA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."';	");
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