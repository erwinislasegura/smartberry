<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/MERCADO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class MERCADO_ADO {
    
   
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
    public function listarMercado(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_mercado  limit 8;	");
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
    public function listarMercadoCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_mercado  WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarMercado2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_mercado  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verMercado($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_mercado  WHERE  ID_MERCADO = '".$ID."';");
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
    public function buscarNombreMercado($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_mercado  WHERE  NOMBRE_MERCADO  LIKE '%".$NOMBRE."%';");
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
    public function agregarMercado(MERCADO $MERCADO){
        try{
            
            
            $query=
            "INSERT INTO  fruta_mercado  (
                                                 NUMERO_MERCADO , 
                                                 NOMBRE_MERCADO , 
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM , 
                                                 INGRESO ,
                                                 MODIFICACION ,
                                                 ESTADO_REGISTRO 
                                            ) VALUES
	       	( ?, ?, ?, ?, ?,   SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                      
                    $MERCADO->__GET('NUMERO_MERCADO')    ,
                    $MERCADO->__GET('NOMBRE_MERCADO')   ,  
                    $MERCADO->__GET('ID_EMPRESA')   ,  
                    $MERCADO->__GET('ID_USUARIOI')   ,  
                    $MERCADO->__GET('ID_USUARIOM')                  
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarRmercado($id){
        try{$sql="DELETE FROM  fruta_mercado  WHERE  ID_MERCADO =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarMercado(MERCADO $MERCADO){
        try{
            $query = "
		UPDATE  fruta_mercado  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_MERCADO = ?    ,
             ID_USUARIOM = ?       
		WHERE  ID_MERCADO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array( 
                    $MERCADO->__GET('NOMBRE_MERCADO'),    
                    $MERCADO->__GET('ID_USUARIOM')     ,               
                    $MERCADO->__GET('ID_MERCADO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(MERCADO $MERCADO){

        try{
            $query = "
    UPDATE  fruta_mercado  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_MERCADO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $MERCADO->__GET('ID_MERCADO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(MERCADO $MERCADO){
        try{
            $query = "
    UPDATE  fruta_mercado  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_MERCADO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $MERCADO->__GET('ID_MERCADO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    public function listarMercadoPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_mercado  
                                            WHERE  ESTADO_REGISTRO  = 1
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
                                                    IFNULL(COUNT(NUMERO_MERCADO),0) AS 'NUMERO'
                                                FROM  fruta_mercado 
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