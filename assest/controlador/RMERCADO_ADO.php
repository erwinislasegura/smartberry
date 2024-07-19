<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/RMERCADO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class RMERCADO_ADO {
    
   
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
    public function listarRmercado(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_rmercado  limit 8;	");
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
    public function listarRmercadoCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_rmercado  WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarRmercado2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_rmercado  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verRmercado($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_rmercado  WHERE  ID_RMERCADO = '".$ID."';");
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
    public function buscarNombreRmercado($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_rmercado  WHERE  NOMBRE_RMERCADO  LIKE '%".$NOMBRE."%';");
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
    public function agregarRmercado(RMERCADO $RMERCADO){
        try{
            
            
            $query=
            "INSERT INTO  fruta_rmercado  (
                                                 NUMERO_RMERCADO ,
                                                 ID_MERCADO ,
                                                 ID_PRODUCTOR , 
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM , 
                                                 INGRESO ,
                                                 MODIFICACION ,
                                                 ESTADO_REGISTRO 
                                            ) VALUES
	       	( ?, ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $RMERCADO->__GET('NUMERO_RMERCADO') ,  
                    $RMERCADO->__GET('ID_MERCADO') ,    
                    $RMERCADO->__GET('ID_EMPRESA')  ,   
                    $RMERCADO->__GET('ID_PRODUCTOR')  ,    
                    $RMERCADO->__GET('ID_USUARIOI')  ,     
                    $RMERCADO->__GET('ID_USUARIOM')               
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarRmercado($id){
        try{$sql="DELETE FROM  fruta_rmercado  WHERE  ID_RMERCADO =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarRmercado(RMERCADO $RMERCADO){
        try{
            $query = "
		UPDATE  fruta_rmercado  SET
             MODIFICACION = SYSDATE(),
             ID_MERCADO = ?   ,
             ID_PRODUCTOR = ? ,
             ID_USUARIOM = ?      
		WHERE  ID_RMERCADO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $RMERCADO->__GET('ID_MERCADO'),    
                    $RMERCADO->__GET('ID_PRODUCTOR'),        
                    $RMERCADO->__GET('ID_USUARIOM')    ,              
                    $RMERCADO->__GET('ID_RMERCADO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCION ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(RMERCADO $RMERCADO){

        try{
            $query = "
    UPDATE  fruta_rmercado  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_RMERCADO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RMERCADO->__GET('ID_RMERCADO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(RMERCADO $RMERCADO){
        try{
            $query = "
    UPDATE  fruta_rmercado  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_RMERCADO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RMERCADO->__GET('ID_RMERCADO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

        public function buscarPorProductor($IDPRODUCTOR){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_rmercado  WHERE  ID_PRODUCTOR = '".$IDPRODUCTOR."';");
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


    
    public function listarRmercadoPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_rmercado  
                                             WHERE  ESTADO_REGISTRO  = 1
                                              AND ID_EMPRESA = '" . $IDEMPRESA . "';	");
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
                                                    IFNULL(COUNT(NUMERO_RMERCADO),0) AS 'NUMERO'
                                                FROM  fruta_rmercado 
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